
tests-php:
	php ./vendor/bin/phpunit tests

docs-php:
	php tools/phpDocumentor.phar -d ./src -t ./docs
