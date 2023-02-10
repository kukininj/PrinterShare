<?php

require_once('Repository.php');
require_once(__DIR__ . '/../models/User.php');

class UserRepository extends Repository
{
    /**
     * @var array<int, User> $users
     */
    private static array $users = [];

    public static function getUserByMerchantID(int $id_merchant): ?User
    {
        $user = array_filter(
            self::$users,
            fn (User $user): bool => $user->id_merchant === $id_merchant
        );

        if (count($user) > 0) // if any user with $id_merchant is already stored
        {
            $id = $user[0]->id_user;
            return self::$users[$id];
        }

        $statement = self::database()->connect()->prepare("
            SELECT users.*, dedicated_areas.area_name
            FROM users
            LEFT JOIN merchant_details ON users.\"ID_merchant\" = merchant_details.\"ID_merchant\"
            LEFT JOIN dedicated_areas ON merchant_details.\"ID_dedicated_area\" = dedicated_areas.\"ID_dedicated_area\"
            WHERE users.\"ID_merchant\"=:ID_merchant;
        ");

        $statement->bindParam('ID_merchant', $id_merchant, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        $user = new User(
            $result['ID_user'],
            $result['email'],
            $result['password'],
            $result['name'],
            $result['surname'],
            $result['profile_picture'],
            $result['ID_merchant'],
            $result['area_name']
        );

        self::$users[$user->id_user] = $user;
        return $user;
    }
    public static function getUserByID(?int $id_user): ?User
    {
        if (is_null($id_user))
            return null;
        if (self::$users[$id_user] ?? false) {
            return self::$users[$id_user];
        }

        $statement = self::database()->connect()->prepare("
            SELECT users.*, dedicated_areas.area_name
            FROM users
            LEFT JOIN merchant_details ON users.\"ID_merchant\" = merchant_details.\"ID_merchant\"
            LEFT JOIN dedicated_areas ON merchant_details.\"ID_dedicated_area\" = dedicated_areas.\"ID_dedicated_area\"
            WHERE users.\"ID_user\"=:ID_user;
        ");

        $statement->bindParam('ID_user', $id_user, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        $user = new User(
            $result['ID_user'],
            $result['email'],
            $result['password'],
            $result['name'],
            $result['surname'],
            $result['profile_picture'],
            $result['ID_merchant'],
            $result['area_name']
        );

        self::$users[$user->id_user] = $user;
        return $user;
    }

    public static function getCurrentUser(): ?User
    {
        $id_user = $_SESSION['ID_user'] ?? null;
        return self::getUserByID($id_user);
    }

    public static function getUserByEmail(string $email): ?User
    {
        $statement = self::database()->connect()->prepare("
            SELECT users.*, dedicated_areas.area_name
            FROM users
            LEFT JOIN merchant_details ON users.\"ID_merchant\" = merchant_details.\"ID_merchant\"
            LEFT JOIN dedicated_areas ON merchant_details.\"ID_dedicated_area\" = dedicated_areas.\"ID_dedicated_area\"
            WHERE users.email=:email;
        ");

        $statement->bindParam('email', $email, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return null;
        }

        $user = new User(
            $result['ID_user'],
            $result['email'],
            $result['password'],
            $result['name'],
            $result['surname'],
            $result['profile_picture'],
            $result['ID_merchant'],
            $result['area_name']
        );

        if (array_key_exists($user->id_user, self::$users)) {
            return self::$users[$user->id_user];
        } else {
            self::$users[$user->id_user] = $user;
            return $user;
        }
    }

    public static function addUser(
        string $email,
        string $password_hash,
        string $name,
        string $surname,
        string $profile_picture,
    ): User {
        $statement = self::database()->connect()->prepare("
            INSERT INTO users (email, password, name, surname, profile_picture)
            VALUES (:email, :password, :name, :surname, :profile_picture)
            RETURNING users.*;
        ");

        $statement->bindParam('email', $email, PDO::PARAM_STR);
        $statement->bindParam('password', $password_hash, PDO::PARAM_STR);
        $statement->bindParam('name', $name, PDO::PARAM_STR);
        $statement->bindParam('surname', $surname, PDO::PARAM_STR);
        $statement->bindParam('profile_picture', $profile_picture, PDO::PARAM_STR);
        $statement->execute();

        $user_data = $statement->fetch(PDO::FETCH_ASSOC);

        $user = new User(
            $user_data['ID_user'],
            $user_data['email'],
            $user_data['password'],
            $user_data['name'],
            $user_data['surname'],
            $user_data['profile_picture'],
            null,
            null
        );

        if (array_key_exists($user->id_user, self::$users))
            fwrite(STDOUT, "user " . $user->id_user . " already in storage, overriding...");

        self::$users[$user->id_user] = $user;

        return $user;
    }

    public static function addMerchant(
        string $email,
        string $password_hash,
        string $name,
        string $surname,
        string $profile_picture,
        string $area,
    ): User {
        $statement = self::database()->connect()->prepare("
        INSERT INTO merchant_details (\"ID_dedicated_area\")
        SELECT \"ID_dedicated_area\" FROM dedicated_areas WHERE area_name=:area_name LIMIT 1
        RETURNING merchant_details.\"ID_merchant\";
        ");

        $statement->bindParam('area_name', $area, PDO::PARAM_STR);
        $statement->execute();

        $user_data = $statement->fetch(PDO::FETCH_ASSOC);
        $id_merchant = $user_data['ID_merchant'] ?? throw new PDOException("invalid area_name");


        $statement = self::database()->connect()->prepare("
            INSERT INTO users (email, password, \"ID_merchant\", name, surname, profile_picture)
            VALUES (:email, :password, :ID_merchant, :name, :surname, :profile_picture)
            RETURNING users.*;
        ");

        $statement->bindParam('email', $email, PDO::PARAM_STR);
        $statement->bindParam('password', $password_hash, PDO::PARAM_STR);
        $statement->bindParam('name', $name, PDO::PARAM_STR);
        $statement->bindParam('surname', $surname, PDO::PARAM_STR);
        $statement->bindParam('profile_picture', $profile_picture, PDO::PARAM_STR);
        $statement->bindParam('ID_merchant', $id_merchant, PDO::PARAM_INT);
        $statement->execute();

        $user_data = $statement->fetch(PDO::FETCH_ASSOC);

        $user = new User(
            $user_data['ID_user'],
            $user_data['email'],
            $user_data['password'],
            $user_data['name'],
            $user_data['surname'],
            $user_data['profile_picture'],
            $user_data['ID_merchant'],
            $area,
        );

        if (array_key_exists($user->id_user, self::$users))
            fwrite(STDOUT, "user " . $user->id_user . " already in storage, overriding...");

        self::$users[$user->id_user] = $user;

        return $user;
    }
}
