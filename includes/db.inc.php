<?php

// Central database connection and query helper

$arrConfig['conn'] = my_connect($arrConfig);

function my_connect($arrConfig)
{
    $conn = new mysqli(
        $arrConfig['servername'],
        $arrConfig['username'],
        $arrConfig['password'],
        $arrConfig['dbname']
    );

    if ($conn->connect_error) {
        // Log the error instead of exposing it to the user
        error_log("DB Connection failed: " . $conn->connect_error);
        die("Erro de ligação à base de dados. Por favor tente mais tarde.");
    }

    $conn->set_charset('utf8mb4'); // utf8mb4 supports full unicode (emojis, etc.)
    return $conn;
}

/**
 * Execute a safe parameterised query.
 *
 * Usage:
 *   my_query("SELECT * FROM users WHERE email = ?", [$email])
 *   my_query("DELETE FROM users WHERE id = ?", [$id])
 *
 * Returns:
 *   array   — for SELECT queries
 *   int     — last insert id (INSERT) or 1 (UPDATE/DELETE success)
 *   0       — on error
 */
function my_query(string $sql, array $params = [], string $types = '')
{
    global $arrConfig;

    $conn = $arrConfig['conn'];

    // If no params supplied fall back to direct query (read-only / no user input)
    if (empty($params)) {
        $result = $conn->query($sql);

        if ($result instanceof mysqli_result) {
            $rows = [];
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } elseif ($result === true) {
            $lastId = $conn->insert_id;
            return $lastId ?: 1;
        }

        error_log("Query error: " . $conn->error . " | SQL: " . $sql);
        return 0;
    }

    // Prepared statement path
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        error_log("Prepare error: " . $conn->error . " | SQL: " . $sql);
        return 0;
    }

    // Auto-detect types if not provided
    if ($types === '') {
        foreach ($params as $p) {
            if (is_int($p))    $types .= 'i';
            elseif (is_float($p)) $types .= 'd';
            else               $types .= 's';
        }
    }

    $stmt->bind_param($types, ...$params);
    $executed = $stmt->execute();

    if (!$executed) {
        error_log("Execute error: " . $stmt->error . " | SQL: " . $sql);
        $stmt->close();
        return 0;
    }

    $result = $stmt->get_result();

    if ($result instanceof mysqli_result) {
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $stmt->close();
        return $rows;
    }

    // INSERT / UPDATE / DELETE
    $lastId = $conn->insert_id;
    $stmt->close();
    return $lastId ?: 1;
}