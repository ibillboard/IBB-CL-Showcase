<?php

namespace App\Model;
use Nette;
use Nette\Security\Passwords;

/**
 * Users management.
 */

class UserManager implements Nette\Security\IAuthenticator
{
	use Nette\SmartObject;
	const
		TABLE_NAME = 'users',
		COLUMN_ID = 'user_id',
		COLUMN_NAME = 'user_email',
		COLUMN_PASSWORD_HASH = 'user_pw',
		COLUMN_ROLE = 'user_role';

	/** @var Nette\Database\Context */
	private $database;

	public function __construct(Nette\Database\Context $database)

	{
		$this->database = $database;
	}
	
	/**
	 * Performs an authentication.
	 * @return Nette\Security\Identity
	 * @throws Nette\Security\AuthenticationException
	 */
	public function authenticate(array $credentials)
	{
		list($username, $password) = $credentials;
		$row = $this->database->table(self::TABLE_NAME)
			->where(self::COLUMN_NAME, $username)
			->fetch();
		if (!$row) {
			throw new Nette\Security\AuthenticationException('The username is incorrect.', self::IDENTITY_NOT_FOUND);
		} elseif (!Passwords::verify($password, $row[self::COLUMN_PASSWORD_HASH])) {
			throw new Nette\Security\AuthenticationException('The password is incorrect.', self::INVALID_CREDENTIAL);
		} elseif (Passwords::needsRehash($row[self::COLUMN_PASSWORD_HASH])) {
			$row->update([
				self::COLUMN_PASSWORD_HASH => Passwords::hash($password),
			]);
		}
		$arr = $row->toArray();
		unset($arr[self::COLUMN_PASSWORD_HASH]);
		return new Nette\Security\Identity($row[self::COLUMN_ID], $row[self::COLUMN_ROLE], $arr);
	}
}
class DuplicateNameException extends \Exception
{
}