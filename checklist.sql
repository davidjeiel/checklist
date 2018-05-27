-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Maio-2018 às 20:20
-- Versão do servidor: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `checklist`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `checklist`
--

CREATE TABLE `checklist` (
  `idResposta` int(11) NOT NULL,
  `idDemanda` int(11) DEFAULT NULL,
  `idPergunta` int(11) DEFAULT NULL,
  `idStatus` int(11) DEFAULT NULL,
  `obs` varchar(3000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `demandas`
--

CREATE TABLE `demandas` (
  `idDemanda` int(11) NOT NULL COMMENT 'Código único que interliga a demanda à checklist e histórico\n',
  `nomeDemanda` varchar(45) DEFAULT NULL,
  `nomeRemetente` varchar(45) DEFAULT NULL,
  `docRemetente` int(11) DEFAULT NULL,
  `dtRecepcao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `solicitacao` varchar(3000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `demandas`
--

INSERT INTO `demandas` (`idDemanda`, `nomeDemanda`, `nomeRemetente`, `docRemetente`, `dtRecepcao`, `solicitacao`) VALUES
(2, 'Demanda teste', 'David Jeiel', 231259182, '2018-05-24 21:39:32', 'teste de cadastramento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `nomeEstado` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `idHistorico` int(11) NOT NULL,
  `idResposta` int(11) NOT NULL,
  `dtParecer` datetime NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `parecer`
--

CREATE TABLE `parecer` (
  `idParecer` int(11) NOT NULL,
  `idDemanda` int(11) NOT NULL,
  `idStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `idPergunta` int(11) NOT NULL,
  `pergunta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `cpf` int(11) NOT NULL,
  `nomeUsuarios` varchar(45) DEFAULT NULL,
  `dtNascimento` date DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cpf`, `nomeUsuarios`, `dtNascimento`, `telefone`, `email`) VALUES
(231259182, 'David Jeiel', '1984-10-23', '61 983002725', 'davidjeiel@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checklist`
--
ALTER TABLE `checklist`
  ADD PRIMARY KEY (`idResposta`),
  ADD KEY `demanda_checklist_idx` (`idDemanda`),
  ADD KEY `pergunta_checklist_idx` (`idPergunta`),
  ADD KEY `status_pergunta_idx` (`idStatus`);

--
-- Indexes for table `demandas`
--
ALTER TABLE `demandas`
  ADD PRIMARY KEY (`idDemanda`),
  ADD KEY `cpf_demandante_idx` (`docRemetente`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indexes for table `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`idHistorico`),
  ADD KEY `resposta_parecer_idx` (`idResposta`),
  ADD KEY `usuario_parecer_idx` (`usuario`);

--
-- Indexes for table `parecer`
--
ALTER TABLE `parecer`
  ADD PRIMARY KEY (`idParecer`),
  ADD KEY `demanda_parecer_idx` (`idDemanda`),
  ADD KEY `estado_parecer_idx` (`idStatus`);

--
-- Indexes for table `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`idPergunta`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cpf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checklist`
--
ALTER TABLE `checklist`
  MODIFY `idResposta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `demandas`
--
ALTER TABLE `demandas`
  MODIFY `idDemanda` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código único que interliga a demanda à checklist e histórico\n', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `historico`
--
ALTER TABLE `historico`
  MODIFY `idHistorico` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `parecer`
--
ALTER TABLE `parecer`
  MODIFY `idParecer` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `idPergunta` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `checklist`
--
ALTER TABLE `checklist`
  ADD CONSTRAINT `demanda_checklist` FOREIGN KEY (`idDemanda`) REFERENCES `demandas` (`idDemanda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pergunta_checklist` FOREIGN KEY (`idPergunta`) REFERENCES `perguntas` (`idPergunta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `status_pergunta` FOREIGN KEY (`idStatus`) REFERENCES `estado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `demandas`
--
ALTER TABLE `demandas`
  ADD CONSTRAINT `cpf_demandante` FOREIGN KEY (`docRemetente`) REFERENCES `usuarios` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `resposta_parecer` FOREIGN KEY (`idResposta`) REFERENCES `parecer` (`idParecer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_parecer` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `parecer`
--
ALTER TABLE `parecer`
  ADD CONSTRAINT `demanda_parecer` FOREIGN KEY (`idDemanda`) REFERENCES `demandas` (`idDemanda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estado_parecer` FOREIGN KEY (`idStatus`) REFERENCES `estado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
