<?php

namespace controllers;

interface ControllerInterface {
    public function handle(Request $request) : ResponseInterface;
}
