<?php


namespace App\Console;

class Console
{
    private array $commands = [
        'serve' => [
            'class' => 'App\Console\Commands\Serve',
            'description' => 'Starts the server.'
        ],
        'routes' => [
            'class' => 'App\Console\Commands\RouteList',
            'description' => 'Shows all routes.'
        ],
    ];

    private array $colors = [
        'black' => ["\033[30m", "\033[0m"],
        'red' => ["\033[31m", "\033[0m"],
        'green' => ["\033[32m", "\033[0m"],
        'yellow' => ["\033[33m", "\033[0m"],
        'blue' => ["\033[34m", "\033[0m"],
        'magenta' => ["\033[35m", "\033[0m"],
        'cyan' => ["\033[36m", "\033[0m"],
        'white' => ["\033[37m", "\033[0m"],
    ];

    public function __invoke($argv): void
    {
        $this->authorDraw();

        if (!isset($argv[1]) || !array_key_exists($argv[1], $this->commands)) {
            $this->draw('Invalid Command', 'red', true);

            $this->draw('Command Available :', 'yellow');


                foreach ($this->commands as $command => $details) {
                    $description = $details['description'] ?? 'No description available';
                    $this->draw($command, 'cyan', false);
                    $this->draw(" ".$description, 'white', false);
                }

            exit(1);
        }
        $commandDetails = $this->commands[$argv[1]];
        $className = $commandDetails['class'];
        $command = new $className();
        $this->draw($command->handle(), 'blue', true);
    }

    private function draw(string $text = '', string $color = 'white', bool $border = false): void
    {
        $color = $this->colors[$color] ?? $this->colors['white'];

        if ($border) $this->borderDraw($color);
        echo $color[0] . ' ' . $text . ' ' . $color[1];
        if ($border) $this->borderDraw($color);

        echo PHP_EOL;
    }

    private function borderDraw($color): void
    {
        echo PHP_EOL . $color[0] . '--------------------------------------------' . $color[1] . PHP_EOL;
    }

    private function authorDraw(): void
    {
        $this->draw(" ██▓ ▒█████      █    ██  ██▓███  ", 'red');
        $this->draw("▓██▒▒██▒  ██▒    ██  ▓██▒▓██░  ██▒", 'red');
        $this->draw("▒██▒▒██░  ██▒   ▓██  ▒██░▓██░ ██▓▒", 'red');
        $this->draw("░██░▒██   ██░   ▓▓█  ░██░▒██▄█▓▒ ▒", 'red');
        $this->draw("░██░░ ████▓▒░   ▒▒█████▓ ▒██▒ ░  ░", 'red');
        $this->draw("░▓  ░ ▒░▒░▒░    ░▒▓▒ ▒ ▒ ▒▓▒░ ░  ░", 'red');
        $this->draw(" ▒ ░  ░ ▒ ▒░    ░░▒░ ░ ░ ░▒ ░     ", 'red');
        $this->draw(" ▒ ░░ ░ ░ ▒      ░░░ ░ ░ ░░       ", 'red');
        $this->draw(" ░      ░ ░        ░              ", 'red');
        $this->draw('Create By Alireza Vahdani (alireza10up).', 'red', true);
    }
}