<?php

namespace Spatie\Remote\Config;

class HostConfig
{
    public string $host;
    public int $port;
    public string $user;
    public string $path;
    public string $privateKeyPath;

    public function __construct(
        string $host,
        int $port,
        string $user,
        string $path,
        string $privateKeyPath
    ) {
        $this->host = $host;
        $this->port = $port;
        $this->user = $user;
        $this->path = $path;
        $this->privateKeyPath = $privateKeyPath;
    }
}