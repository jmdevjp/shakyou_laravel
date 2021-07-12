<?php

declare(strict_types=1);

namespace App\DataProvider;

use App\DataProvider\Eloquent\Publisher as EloquentPublisher;
use App\Domain\Entity\Publisher;

interface PublisherRepositoryInterface
{
    public function findByName(string $name): ?Publisher;

    public function store(Publisher $publisher): int;
}
