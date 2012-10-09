<?php

Mapper::root('home');

# sample
Mapper::connect('/url-a-ser-acessada', '/home/index');

# contact
Mapper::connect('/contato', '/contact');