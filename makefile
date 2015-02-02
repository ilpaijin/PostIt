install:
	composer install
	php bin/console init

test:
	# Testing testsuite in isolation
	vendor/bin/phpunit --testsuite Application --debug

admin:
	php bin/console admin	
