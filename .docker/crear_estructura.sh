#!/bin/bash
mkdir -p ../.apache/run/apache2
mkdir -p ../.apache/log/apache2
mkdir -p ../.apache/lock/apache2
touch ../.apache/run/apache2.pid
chown -R adimedia.adimedia ../