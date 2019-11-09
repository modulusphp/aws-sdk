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

  /**
   * Get aws key
   *
   * @return string
   */
  private function getAWSKey() : string
  {
    return (

      Config::has('aws.credentials.key') ?

      Config::get('aws.credentials.key') :

      ''

    );
  }

  /**
   * Get aws secret
   *
   * @return string
   */
  private function getAWSSecret() : string
  {
    return (

      Config::has('aws.credentials.secret') ?

      Config::get('aws.credentials.secret') :

      ''

    );
  }
}
