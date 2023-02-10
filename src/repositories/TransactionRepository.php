<?php

require_once 'Repository.php';
require_once(__DIR__ . '/../models/Transaction.php');

class TransactionRepository extends Repository
{
    /**
     * @var array<int, Transaction> $transactions
     */
    private static array $offers = [];

    public static function createTransaction(
        int $id_user,
        int $id_offer,
        TransactionStatus $status,
        string $notes
    ) {
        $statement = self::database()->connect()->prepare("
        INSERT INTO public.transactions (
            \"ID_transaction\", 
            \"ID_user\", 
            \"ID_offer\", 
            status, 
            notes
        ) VALUES (
            DEFAULT, 
            :id_user::integer, 
            :id_offer::integer, 
            :status::transaction_status, 
            :notes::varchar(1024)
        ) RETURNING transactions.*;
        ");

        $statement->bindParam("id_user", $id_user, PDO::PARAM_INT);
        $statement->bindParam("id_offer", $id_offer, PDO::PARAM_INT);
        $status = $status->value;
        $statement->bindParam("status", $status, PDO::PARAM_STR);
        $statement->bindParam("notes", $notes, PDO::PARAM_STR);

        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        $transaction = new Transaction(
            $result['ID_transaction'],
            $result['ID_user'],
            $result['ID_offer'],
            TransactionStatus::from($result['status']),
            $result['notes'],
        );

        self::$offers[$transaction->id_transaction] = $transaction;
    }
}
