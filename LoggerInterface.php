<?php

declare(strict_types=1);

namespace Homework;

/**
 * Main interface for loggers.
 */
interface LoggerInterface {

	/**
	 * Add error entity to log.
	 *
	 * @param string $message
	 *
	 * @return void
	 */
	public function logError(string $message): void;

	/**
	 * Add success entity to log.
	 *
	 * @param string $message
	 *
	 * @return void
	 */
	public function logSuccess(string $message): void;
}
