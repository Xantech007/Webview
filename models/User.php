<?php
require_once "../app/core/Model.php";

class User extends Model {

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getStats($id) {

        $stats = [];

        $stats['total_tasks'] = $this->db
            ->query("SELECT COUNT(*) FROM task_logs WHERE user_id=$id")
            ->fetchColumn();

        $stats['total_deposits'] = $this->db
            ->query("SELECT IFNULL(SUM(amount),0) FROM deposits WHERE user_id=$id AND status='approved'")
            ->fetchColumn();

        $stats['total_withdrawals'] = $this->db
            ->query("SELECT IFNULL(SUM(amount),0) FROM withdrawals WHERE user_id=$id AND status='approved'")
            ->fetchColumn();

        return $stats;
    }
}
