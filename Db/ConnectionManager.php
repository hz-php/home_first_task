<?php

namespace db;

interface ConnectionManager
{
    public function getConnection(): object;
}