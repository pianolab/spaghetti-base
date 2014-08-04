-- --------------------------------------------------------

--
-- Estrutura da tabela `modules`
--

CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `parent_name` varchar(140) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `label` varchar(140) DEFAULT NULL,
  `origin_name` varchar(140) DEFAULT NULL,
  `type` varchar(140) DEFAULT NULL,
  `size` varchar(140) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `file_name` varchar(50) NOT NULL DEFAULT '',
  `path` varchar(100) NOT NULL DEFAULT '',
  `type` varchar(50) NOT NULL DEFAULT 'default',
  `in_menu` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `modules`
--

INSERT INTO `modules` (`id`, `name`, `file_name`, `path`, `type`, `in_menu`) VALUES
(1, 'Usuários', '', 'user', 'manual', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modules_users`
--

CREATE TABLE IF NOT EXISTS `modules_users` (
  `module_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`module_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `modules_users`
--

INSERT INTO `modules_users` (`module_id`, `user_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `module_menus`
--

CREATE TABLE IF NOT EXISTS `module_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL DEFAULT '',
  `path` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `module_menus`
--

INSERT INTO `module_menus` (`id`, `module_id`, `name`, `path`) VALUES
(14, 1, 'inserir', 'add'),
(15, 1, 'Ver todos', 'lists');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mod_languages`
--

CREATE TABLE IF NOT EXISTS `mod_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `flag` varchar(5) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `mod_languages`
--

INSERT INTO `mod_languages` (`id`, `name`, `flag`, `status`) VALUES
(1, 'Portguês', 'br', 1),
(2, 'Inglês', 'us', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(60) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT '1',
  `privileges` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `status`, `privileges`, `created_at`, `updated_at`) VALUES
(1, 'Agencia Piano Lab', 'agencia@pianolab.com.br', 'ab758a8e39cd39371b9bb807b4e50561', 1, 999, '2009-10-16 09:41:29', '2009-10-16 09:41:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inquiries`
--

CREATE TABLE IF NOT EXISTS `inquiries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(140),
  `email` varchar(100),
  `phone` varchar(60),
  `born_in` date,
  `message` text,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
