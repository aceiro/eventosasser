ALTER TABLE `participante`
DROP PRIMARY KEY,
ADD PRIMARY KEY (`id`, `email`);


ALTER TABLE `participante`
ADD UNIQUE INDEX `email_UNIQUE` (`email` ASC),
ADD UNIQUE INDEX `id_UNIQUE` (`id` ASC);