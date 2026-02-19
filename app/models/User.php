public function findByEmail($email) {
    $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetch();
}

public function create($username, $email, $password) {

    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $refCode = substr(md5(uniqid()), 0, 8);

    $stmt = $this->db->prepare("
        INSERT INTO users (username, email, password, referral_code)
        VALUES (?, ?, ?, ?)
    ");

    return $stmt->execute([
        $username,
        $email,
        $hashed,
        $refCode
    ]);
}
