<?php

namespace app\Request;

use AllowDynamicProperties;
use app\Core\HTTP\Request\Request;

#[AllowDynamicProperties] class HomePageRequest extends Request
{
    private array $query;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function fromRequest()
    {
        $this->query = $this->request->getQuery();
    }

    public function getQuery(): array
    {
        return $this->query;
    }

    public function getUploadStatus()
    {
        return $this->query['uploadStatus'] ?? null;
    }
}