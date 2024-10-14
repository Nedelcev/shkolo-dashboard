<?php

require_once 'models/Database.php';

class Button {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllButtons() {
        $query = "SELECT * FROM dashboard_buttons ORDER BY position ASC";
        return $this->db->query($query);
    }

    public function getButton($position) {
        $query = "SELECT * FROM dashboard_buttons WHERE position = $position";
        return $this->db->query($query)->fetch_assoc();
    }

    public function saveButton($position, $title, $link, $color) {
        $query = "REPLACE INTO dashboard_buttons (position, title, link, color) VALUES ($position, '$title', '$link', '$color')";
        return $this->db->execute($query);
    }

    public function deleteButton($position) {
        $query = "DELETE FROM dashboard_buttons WHERE position = $position";
        return $this->db->execute($query);
    }
	
    // Update button position by its ID
    public function updatePosition($id, $newPosition) {
        // Check if $id and $newPosition are valid
        if (empty($id) || empty($newPosition)) {
            throw new Exception("Invalid ID or Position provided: ID = $id, Position = $newPosition");
        }

        // Ensure $id and $newPosition are integers to avoid SQL injection or bad inputs
        $id = (int) $id;
        $newPosition = (int) $newPosition;

        // Perform the query
        $query = "UPDATE dashboard_buttons SET position = $newPosition WHERE id = $id";
        return $this->db->execute($query);
    }
}
