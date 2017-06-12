<?php

use Nette\CodeChecker\Tasks;
use Nette\CodeChecker\Result;
use Tester\Assert;

require __DIR__ . '/bootstrap.php';


test(function () {
	$result = new Result;
	Tasks::neonSyntaxChecker('a: b', $result);
	Assert::same([], $result->getMessages());
});

test(function () {
	$result = new Result;
	Tasks::neonSyntaxChecker('a: b: c', $result);
	Assert::same([[Result::ERROR, 'Unexpected \':\' on line 1, column 5.', NULL]], $result->getMessages());
});