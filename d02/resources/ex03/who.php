#!/usr/bin/php
<?php

$lines = file("/var/run/utmpx");
print($lines);
