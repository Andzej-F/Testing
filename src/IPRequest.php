<?php

declare(strict_types=1);

class IPRequest
{
    public function setTimestampCount($ip, $id, $conn)
    {
        $query = $conn
            ->prepare("INSERT INTO `ip` (`id`, `address`, `timestamp`) VALUES (:id, :ip, :CURRENT_TIMESTAMP)");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':ip', $ip, PDO::PARAM_STR);
        $query->execute();
    }
}
