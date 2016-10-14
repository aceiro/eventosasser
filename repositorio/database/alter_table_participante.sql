ALTER TABLE `participante`
DROP PRIMARY KEY,
ADD PRIMARY KEY (`id`, `email`);