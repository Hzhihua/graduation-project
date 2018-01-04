#!/bin/bash
sudo find ./* -type f -exec chmod 0644 {} \;
sudo find ./* -type d -exec chmod 0755 {} \;
