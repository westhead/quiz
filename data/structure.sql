CREATE TABLE IF NOT EXISTS `test`.`responder` (
  `responderID` INT NOT NULL,
  `emailAddress` CHAR(128) NOT NULL,
  PRIMARY KEY (`responderID`));

CREATE TABLE IF NOT EXISTS `test`.`test` (
  `testID` INT NOT NULL,
  `shortName` CHAR(128) NOT NULL,
  PRIMARY KEY (`testID`));

CREATE TABLE  IF NOT EXISTS `test`.`response` (
  `responseID` INT NOT NULL,
  `responderID` INT NOT NULL,
  `testID` INT NULL,
  PRIMARY KEY (`responseID`),
  INDEX `fk_test_idx` (`testID` ASC),
  CONSTRAINT `fk_response_test`
    FOREIGN KEY (`testID`)
    REFERENCES `test`.`test` (`testID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `test`.`question` (
  `questionID` INT NOT NULL,
  `testID` INT NULL,
  `question` CHAR(128) NOT NULL,
  `sequenceNumber` INT NULL,
  PRIMARY KEY (`questionID`),
  INDEX `fk_test_idx` (`testID` ASC),
  CONSTRAINT `fk_question_test`
    FOREIGN KEY (`testID`)
    REFERENCES `test`.`test` (`testID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `test`.`answer_option` (
  `answerOptionID` INT NOT NULL,
  `questionID` INT NULL,
  `answerOption` CHAR(128) NOT NULL,
  `sequenceNumber` INT NULL,
  PRIMARY KEY (`answerOptionID`),
  INDEX `fk_answeroption_question_idx` (`questionID` ASC),
  CONSTRAINT `fk_answeroption_question`
    FOREIGN KEY (`questionID`)
    REFERENCES `test`.`question` (`questionID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `test`.`response_answer` (
  `responseAnswerID` INT NOT NULL,
  `responseID` INT NULL,
  `questionID` INT NULL,
  `answerOptionID` INT NOT NULL,
  PRIMARY KEY (`responseAnswerID`),
  INDEX `fk_response_answer_response_idx` (`responseID` ASC),
  INDEX `fk_response_answer_question_idx` (`questionID` ASC),
  INDEX `fk_response_answer_option_idx` (`answerOptionID` ASC),
  CONSTRAINT `fk_response_answer_response`
    FOREIGN KEY (`responseID`)
    REFERENCES `test`.`response` (`responseID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_response_answer_question`
    FOREIGN KEY (`questionID`)
    REFERENCES `test`.`question` (`questionID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_response_answer_option`
    FOREIGN KEY (`answerOptionID`)
    REFERENCES `test`.`answer_option` (`answerOptionID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
