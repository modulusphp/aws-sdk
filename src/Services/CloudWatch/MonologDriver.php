<?php

namespace Modulus\Aws\Services\CloudWatch;

use Modulus\Aws\Mocks\AWSConfig;
use Monolog\Formatter\JsonFormatter;
use Modulus\Hibernate\Logging\Driver;
use Aws\CloudWatchLogs\CloudWatchLogsClient;

class MonologDriver extends Driver
{
  use AWSConfig;

  /**
   * {@inheritDoc}
   */
  public function formatter()
  {
    return new JsonFormatter;
  }

  /**
   * Get group name
   *
   * @return string
   */
  private function getGroupName() : string
  {
    return (

      Config::has("logging.channels.{$this->getName()}.group_name") ?

      Config::get("logging.channels.{$this->getName()}.group_name") :

      '/aws/modulus/application'

    );
  }

  /**
   * Create AWS cloud watch client
   *
   * @return CloudWatchLogsClient
   */
  private function getAWSClient() : CloudWatchLogsClient
  {
    return new CloudWatchLogsClient([
      'region' => $this->getAWSRegion(),
      'version' => $this->getAWSVersion(),
      'credentials' => [
        'key' => $this->getAWSKey(),
        'secret' => $this->getAWSSecret()
      ]
    ]);
  }
}