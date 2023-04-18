<?php

namespace Spatie\Remote\Config;

use Spatie\Remote\Exceptions\CouldNotExecuteCommand;

class RemoteConfig
{
    public static function getHost(string $hostName): HostConfig
    {
        $configValues = config("remote.hosts") ?? [];
        $configValues = $configValues[$hostName] ?? null;

        if (is_null($configValues)) {
            throw CouldNotExecuteCommand::hostNotFoundInConfig($hostName);
        }

        foreach (['host', 'port', 'user', 'path', 'privateKeyPath'] as $configValue) {
            if (is_null($configValues[$configValue])) {
                throw CouldNotExecuteCommand::requiredConfigValueNotSet($hostName, $configValue);
            }
        }

        return new HostConfig(
            $configValues['host'],
            $configValues['port'],
            $configValues['user'],
            $configValues['path'],
            $configValues['privateKeyPath']
        );
    }
}
