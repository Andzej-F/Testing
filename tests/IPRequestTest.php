<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class IPRequestTest extends TestCase
{
    public function testSetTimestampCount()
    {
        $table = 'ip';
        $id = '99';
        $ip = '127.0.0.1';

        $stmt = $this->createMock(\PDOStatement::class);
        $stmt->expects($this->once())
            ->method('execute');

        $stmt->expects($this->exactly(2))
            ->method('bindValue')
            ->withConsecutive(
                [':id', $id, PDO::PARAM_INT],
                [':ip', $ip, PDO::PARAM_STR]
            );

        $pdo = $this->createMock('PDO');
        $pdo->expects($this->once())
            ->method('prepare')
            ->with("INSERT INTO `ip` (`id`, `address`, `timestamp`) VALUES (:id, :ip, :CURRENT_TIMESTAMP)")
            ->willReturn($stmt);

        $validData = [
            'id' => $id,
            'ip' => $ip,
            'conn' => $pdo
        ];

        $ipStmt = new IPRequest();
        $ipStmt->setTimestampCount(...$validData);
    }
}
