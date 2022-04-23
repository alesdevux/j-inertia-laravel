<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class testSeed extends Command {
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'test:seed {--filter=}';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Command description';

  public function __construct() {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle() {
    $filter = $this->option('filter');

    $this->call('test', [
      '--filter' => $filter,
    ]);
    $this->call('migrate:fresh');
    $this->call('db:seed');
  }
}
