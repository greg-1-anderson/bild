<?php

/**
 * @file
 */

namespace Bild\Console\Command\Project;

use Bild\Console\Command\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 *
 */
class LoadComposerDependencies extends BaseCommand {


  /**
   * @see http://symfony.com/doc/current/components/console/introduction.html#creating-a-basic-command
   */
  protected function configure() {

    parent::configure();

    $this
      ->setName('project:load-composer-dependencies')
      ->setDescription('Installs composer dependencies for the project');

  }


  /**
   * @{inheritdoc}
   *
   * @throws \RuntimeException
   */
  protected function execute(InputInterface $input, OutputInterface $output) {

    $output->writeln('<info>Installing coder code sniffer...</info>');
    $phpcs = $this->bin . '/phpcs';
    $phpcbf = $this->bin . '/phpcbf';
    $coder = dirname($this->bin) . '/drupal/coder/coder_sniffer';

    $this->executeProcess("$phpcs --config-set installed_paths $coder");
    $this->executeProcess("$phpcbf --config-set installed_paths $coder");
  }

}
