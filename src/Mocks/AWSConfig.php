<?php

namespace Modulus\Aws\Mocks;

use Modulus\Support\Config;

trait AWSConfig
{
  /**
   * Get aws default region
   *
   * @return string
   */
  private function getAWSRegion() : string
  {
    return (

      Config::has('aws.region') ?

      Config::get('aws.region') :

      'eu-west-1'

    );
  }

  /**
   * Get aws default version
   *
   * @return string
   */
  private function getAWSVersion() : string
  {
    return (

      Config::has('aws.version') ?

      Config::get('aws.version') :

      'latest'

    );
  }
}
