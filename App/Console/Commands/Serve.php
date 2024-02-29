<?php

namespace App\Console\Commands;

class Serve {
	public function handle(): void {
		exec('php -S localhost:8585 -t .');
	}
}