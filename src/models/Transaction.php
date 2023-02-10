<?php

enum TransactionStatus: string
{
    case AwaitingResponseFromMerchant = 'Oczekuje odpowiedź sprzedawcy';
    case AwaitingRepsonseFromClient = 'Oczekuje odpowiedź klienta';
    case Printing = 'W trakcie wydruku';
    case FinishedSucessfully = 'Zakończone pomyślnie';
    case Rejected = 'Odrzucone';
}

class Transaction
{
    public int $id_transaction;
    public int $id_user;
    public int $id_offer;
    public TransactionStatus $status;
    public string $notes;

    public function __construct(
        int $id_transaction,
        int $id_user,
        int $id_offer,
        TransactionStatus $status,
        string $notes
    ) {
        $this->id_transaction = $id_transaction;
        $this->id_user = $id_user;
        $this->id_offer = $id_offer;
        $this->status = $status;
        $this->notes = $notes;
    }

    public function getStatusColorClass(): string
    {
        switch ($this->status) {
            case TransactionStatus::AwaitingRepsonseFromClient:
            case TransactionStatus::AwaitingResponseFromMerchant:
                return "status-blue";
            case TransactionStatus::Printing:
                return "status-yellow";
            case TransactionStatus::FinishedSucessfully:
                return "status-green";
            case TransactionStatus::Rejected:
                return "status-red";
        }
        return "";
    }
}
