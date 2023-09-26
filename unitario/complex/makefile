install:
	composer require --dev phpunit/phpunit && \
	composer require spatie/phpunit-watcher --dev
init:
	phpunit --generate-configuration

test:
	phpunit

test-watch:
	./vendor/spatie/phpunit-watcher/phpunit-watcher watch --filter=PasswordTest