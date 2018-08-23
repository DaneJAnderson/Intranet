-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2018 at 11:01 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cok_intranet`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_byID_Retrieve` (IN `id` INT UNSIGNED)  NO SQL
    SQL SECURITY INVOKER
BEGIN
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
    	ROLLBACK;
        
		GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
 		@errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
        
        INSERT INTO db_errors (ERROR_NUMBER, STATE, TEXT, Procedure_or_Function_name)
		VALUES (@errno, @sqlstate, @text, 'articles_byID_Retrieve');
    
        RESIGNAL;
	END;
    
	START TRANSACTION;
    	SELECT articles.id, articles.title, articles.content, articles.image, articles.file, articles.updated_at
		FROM articles
        WHERE articles.status = 1
        AND articles.id = id
        ORDER BY articles.id DESC;
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_lastest_Retrieve` ()  NO SQL
    SQL SECURITY INVOKER
BEGIN
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
    	ROLLBACK;
        
		GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
 		@errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
        
        INSERT INTO db_errors (ERROR_NUMBER, STATE, TEXT, Procedure_or_Function_name)
		VALUES (@errno, @sqlstate, @text, 'articles_lastest_Retrieve');
    
        RESIGNAL;
	END;
    
	START TRANSACTION;
    	SELECT articles.id, articles.title, articles.content, articles.image, articles.file, articles.updated_at
		FROM articles
        WHERE articles.status = 1
        ORDER BY articles.id DESC
        LIMIT 10;
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_Retrieve` ()  NO SQL
    SQL SECURITY INVOKER
BEGIN
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
    	ROLLBACK;
        
		GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
 		@errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
        
        INSERT INTO db_errors (ERROR_NUMBER, STATE, TEXT, Procedure_or_Function_name)
		VALUES (@errno, @sqlstate, @text, 'articles_Retrieve');
    
        RESIGNAL;
	END;
    
	START TRANSACTION;
    	SELECT articles.id, articles.title, articles.content, articles.image, articles.file, articles.updated_at
		FROM articles
        WHERE articles.status = 1
        ORDER BY articles.id DESC;
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `documents_byType_Retrieve` (IN `type_id` INT UNSIGNED)  NO SQL
    SQL SECURITY INVOKER
BEGIN
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
    	ROLLBACK;
        
		GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
 		@errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
        
        INSERT INTO db_errors (ERROR_NUMBER, STATE, TEXT, Procedure_or_Function_name)
		VALUES (@errno, @sqlstate, @text, 'documents_byType_Retrieve');
    
        RESIGNAL;
	END;
    
	START TRANSACTION;
    	SELECT documents.id, documents.name, documents.type, documents.file, documents.format
		FROM documents
        LEFT JOIN document_types
        ON documents.type = document_types.id
        WHERE documents.type = type_id
        and documents.status = 1
        AND document_types.status = 1
        ORDER BY documents.name ASC;
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `document_types_Retrieve` ()  NO SQL
    SQL SECURITY INVOKER
BEGIN
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
    	ROLLBACK;
        
		GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
 		@errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
        
        INSERT INTO db_errors (ERROR_NUMBER, STATE, TEXT, Procedure_or_Function_name)
		VALUES (@errno, @sqlstate, @text, 'document_types_Retrieve');
    
        RESIGNAL;
	END;
    
	START TRANSACTION;
    	SELECT document_types.id, document_types.name
		FROM document_types
        WHERE document_types.status = 1
        ORDER BY document_types.name ASC;
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `users_byUsernameOrEmail_Retrieve` (IN `username` VARCHAR(100))  NO SQL
    SQL SECURITY INVOKER
BEGIN
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
    	ROLLBACK;
        
		GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
 		@errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
        
        INSERT INTO db_errors (ERROR_NUMBER, STATE, TEXT, Procedure_or_Function_name)
		VALUES (@errno, @sqlstate, @text, 'users_byUsernameOrEmail_Retrieve');
    
        RESIGNAL;
	END;
    
	START TRANSACTION;
    	SELECT *
		FROM users
        WHERE users.username = username
        OR
        users.email = username;
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `users_Create` (IN `username` VARCHAR(100), IN `email` VARCHAR(100), IN `encrypted_password` VARCHAR(100), IN `first_name` VARCHAR(100), IN `last_name` VARCHAR(100), IN `number` INT)  NO SQL
    SQL SECURITY INVOKER
BEGIN
		DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
    	ROLLBACK;
        
		GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
 		@errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
        
        INSERT INTO db_errors (ERROR_NUMBER, STATE, TEXT, Procedure_or_Function_name)
		VALUES (@errno, @sqlstate, @text, 'users_Create');
    
        RESIGNAL;
	END;
    
    	START TRANSACTION;
        INSERT INTO users(username, email, encrypted_password, first_name, last_name, number)
        VALUES(username, email, encrypted_password, first_name, last_name, number);
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `users_password_Update` (IN `username` VARCHAR(100), IN `password` VARCHAR(100))  NO SQL
    SQL SECURITY INVOKER
BEGIN
		DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
    	ROLLBACK;
        
		GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
 		@errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
        
        INSERT INTO db_errors (ERROR_NUMBER, STATE, TEXT, Procedure_or_Function_name)
		VALUES (@errno, @sqlstate, @text, 'users_password_Update');
    
        RESIGNAL;
	END;
    
    	START TRANSACTION;
        UPDATE users
        SET encrypted_password = password
        WHERE users.username = username;
    COMMIT;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` text,
  `file` text,
  `status` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `image`, `file`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'INTRODUCTION OF OUR NEWEST PRODUCT - COK UNSECURED LOAN', '\r\nGood Afternoon Team Members,\r\n\r\n \r\nWe are introducing a new product - COK Unsecured Loan ( LN285). This product will take over all the existing unsecured loans that we currently have on our books. These existing loans will eventually be phased out over time as the members loan mature. \r\n\r\n \r\nThe features are as follows\r\n \r\nThe maximum tenure is 66 months\r\n \r\nThe maximum loan is $ 2.5M ( please note that this is our existing maximum loan amount per member)\r\n \r\nShare requirement - 10%\r\n \r\nInterest rate 22%\r\n \r\nThis loan can be used for any purpose for example (but not limited to) back to school expenses, debt consolidation, personal expenses, home improvement etc\r\n \r\nTHE PROMOTION OF THIS NEW PRODUCT WILL COMMENCE THIS WEEK IN THE MEDIA\r\n \r\n \r\nHOWEVER PLEASE NOTE THE FOLLOWING CRITICAL INFORMATION\r\n \r\nWe will deactivate all the existing unsecured loans ( see listing below) so that no reloans nor additional loans nor new loans can be granted under these products\r\n \r\nFAST Loan\r\n \r\nSpecial Education Loan\r\n \r\nDebt Con Plus\r\n \r\nPensioners Plus\r\n \r\nScholar Plus\r\n \r\nHome Equity Plus\r\n \r\n \r\nAll new and reloans would be facilitated under the new product - COK Unsecured Loan ( LN285)\r\nThe members will have the option of keeping the original loan until expiry plus taking the new facility under the new unsecured product\r\nDue to the affordability issue the member may not want to have two separate loans and hence may opt for the loans to be combined. With this case the member has the option of taking the facility with the new product - COK Unsecured loan but the interest rate would be the same as the original rate of the loan with a minimum of 22% ( see examples below)\r\nIf the member has a Scholar Plus @ 15% or a Home Equity Plus @ 18% and needs a reloan, the combined loan amount will be done under the new product @ 22% ( Yes, I hear you saying that this may be drastic hike however the Scholar Plus and the Home Equity Plus rates were promotional rates which never changed at the end of the promotion)\r\nIf the member has a FAST loan @ 25% and needs a reloan, the combined loan amount will be done under the new product @ 25%\r\nPlease be guided accordingly and feel free to contact me should you require any additional clarification.\r\n', NULL, NULL, 1, '2018-08-02 11:09:04', 'palmerg', '2018-08-02 11:09:04', 'palmerg'),
(2, 'Staff Charged Off Collection Programme', 'Good afternoon all,\r\n \r\n \r\nPlease be reminded that you are expected to make checks on FIN2000 thoroughly before contacting our members. Reference is being made to our training session given for some Staff Members located at the Head Office Board Room May 2018 month end,where Sheldon Gooden went through how to check accounts.\r\n \r\nPlease see guidelines as a refresher on how to check accounts:\r\n \r\nGo onto FIN2000\r\n \r\nClick on loan account\r\n \r\nthen click on Accounts Details at the bottom of first screen to ensure member has not liquidated their loan, in Accounts Details you will find (Summary, Repayments, and Activities etc)\r\nChecks in Repayment will assist you in knowing if member paid as per your arrangements\r\nChecks in summary will assist you in advising the member on their loan status and or if there is still a balance on the account for example if summary is reflecting a zero balance that means the account is liquidated, and there would not be any need to contact same.\r\n\r\n \r\n \r\nIf persons are not completely accustomed to checking FIN2000, please feel free to contact any member of the DMU department for assistance in this regard.\r\n \r\nBe reminded that accounts are charged off on a by monthly, annually basis and as such accounts will be on your listing that have been liquidated as members do have the option with out our knowledge to go in branch and pay on their account.\r\n \r\nTherefore, as staff collectors please ensure you check FIN2000 for messages, and content manager for information required. \r\n \r\nRemember that you have an advantage over our external collectors as they are not privy to our live database (FIN2000).\r\n \r\nThanks to all the staff members who have already been able to collect funds due to their hard work thus far. \r\n \r\n \r\nKeep up the Great Job thus far', NULL, NULL, 1, '2018-08-02 11:11:52', 'palmerg', '2018-08-02 11:11:52', 'palmerg'),
(3, 'Group Health Insurance Renewal 2018', 'Good morning Team Members,\r\n \r\n \r\n\r\nAs you are aware, the renewal period for our Group Health Insurance is July 1, 2018. We have been working assiduously with our Broker and the Health Insurance Providers to get competitive renewal rates. At this time an increase is unavoidable based on the utilization. As soon as it has been finalized, we will provide you with more details. \r\n \r\nOnce the renewal has been approved, the Provider will move swiftly to have our renewal cards printed. Based on the flow of the negotiations so far, we are at a stage where we know that we are not likely to switch providers and so your swipe card will be active on July 1, 2018. Your new benefit card will be delivered to you as soon as possible following the conclusion of the process. If for any reason you attempt to access services and the card is not functional, please follow the usual process of paying up-front and submitting the claim form.\r\n \r\nThis is an interim update. We will provide you with more details as soon as possible.\r\n \r\n \r\nBest regards,', NULL, NULL, 1, '2018-08-02 11:14:18', 'palmerg', '2018-08-02 11:14:18', 'palmerg'),
(4, 'SMS promoting COK Loan Sale', 'Good afternoon team,\r\n\r\nPlease be advised that the following message was sent to the general public promoting the upcoming loan sale.\r\n\r\nLimited time offer. Borrow $550,000 and pay as low as $15,190 monthly. Offer available at our Half Way Tree branch this Saturday. Call 8765780057 for info\r\n\r\nShould a prospective client make contact with you or your department, please ask for a contact number and name and send the information to a member of the marketing department. \r\n\r\nThank you.', NULL, NULL, 1, '2018-08-02 11:15:55', 'palmerg', '2018-08-02 11:15:55', 'palmerg');

-- --------------------------------------------------------

--
-- Table structure for table `db_errors`
--

CREATE TABLE `db_errors` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ERROR_NUMBER` int(11) NOT NULL,
  `STATE` int(11) NOT NULL,
  `TEXT` varchar(8000) NOT NULL,
  `Procedure_or_Function_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` int(10) UNSIGNED NOT NULL,
  `file` text NOT NULL,
  `format` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `name`, `type`, `file`, `format`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Business loan Checklist', 2, 'PDF/checklist/Business_Loans.pdf', 1, 1, '2018-02-08 00:00:00', 1, '2018-02-08 00:00:00', 1),
(2, 'COK AIR Checklist', 2, 'PDF/checklist/COK AIR LOAN CHECKLIST.pdf', 1, 3, '2018-02-08 00:00:00', 1, '2018-02-08 00:00:00', 1),
(3, 'COK SCHOLAR Loan', 2, 'PDF/checklist/SCHOLAR_LOAN .pdf', 1, 1, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(4, 'Collateral Assignment Form', 2, 'PDF/checklist/Form_Of_Collateral_Assignment.pdf', 1, 1, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(5, 'Courts Fast Loan Checklist', 2, 'PDF/checklist/COURTS FAST LOAN CHECKLIST.pdf', 1, 3, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(6, 'Debt Consolidation Loan', 2, 'PDF/checklist/DebtConsolidationLoan.pdf', 1, 3, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(7, 'Education Loan Checklist', 2, 'PDF/checklist/Education Loan check list revised.pdf', 1, 3, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(8, 'Fast Loan Checklist', 2, 'PDF/checklist/FAST_LOAN.pdf', 1, 3, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(9, 'Home Equity / Mortgage Loan Checklist', 2, 'PDF/checklist/HomeEquityAndMortgage.pdf', 1, 1, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(10, 'HOME by COK Checklist', 2, 'PDF/HOME by COK Mortgage Plan CHECKLIST.pdf', 1, 1, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(11, 'Corporate Account Checklist', 7, 'PDF/CORPORATE_ACCOUNT_CHECKLIST.pdf', 1, 1, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(12, 'Disbursement Checklist', 2, 'PDF/DISBURSEMENT CHECKLIST.pdf', 1, 1, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(13, 'Mortgage Document Request', 2, 'PDF/MORTGAGE_DOCUMENT_REQUEST_25022013.pdf', 1, 1, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(14, 'COK Pensioners Loan', 2, 'PDF/checklist/COK_PENSIONERS_LOAN.pdf', 1, 3, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(15, 'Payday Loan Checklist 2015', 2, 'PDF/checklist/ChecklistPayDayloan2015.pdf', 1, 1, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(16, 'Payday Loan Checklist 2015', 2, 'PDF/checklist/ChecklistPayDayloan2015.pdf', 1, 3, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(17, 'Special Education Loan Checklist', 2, 'PDF/checklist/SpecialEducationLoan .pdf', 1, 3, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(18, 'UCC Fast Loan Checklist', 2, 'PDF/checklist/UCC FAST LOAN CHECKLIST.pdf', 1, 3, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(19, 'Ratio Loan', 2, 'PDF/checklist/Ratio_Loans.pdf', 1, 1, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(20, 'Wedding Loan Checklist', 2, 'PDF/checklist/WEDDING LOAN CHECKLIST.pdf', 1, 3, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(21, 'SOP Cheque Deposit Box Clearing', 3, 'PDF/SOP_Cheque_Deposit_Box_Clearing.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(22, 'Credit Policy', 8, 'PDF/CreditPolicy2017.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(23, 'Procedure for Death and Disability Claim', 3, 'PDF/SOP_Procedure_for_Death_and_Disability_Claim.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(24, 'Security Procedure', 3, 'PDF/SOP_Security_procedures.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(25, 'SOP Remittance Transactions', 3, 'PDF/SOPRemittance_Transactions.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(26, 'SOP Teller Random Checks', 3, 'PDF/SOP_Teller_Random_Checks.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(27, 'Payment Module Quick Reference 2014', 1, 'PDF/Updated_2014QuickReferencePaymentModule.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(28, 'Fraudulent Document Identification', 3, 'PDF/FRAUDULENT_DOCUMENT_IDENTIFICATION.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(29, 'SOP Lodgement Slips', 3, 'PDF/SOPLodgement_Slips.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(30, 'Procedure for Bomb Threat', 3, 'PDF/SOPLodgement_Slips.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(31, 'ID Verification', 3, 'PDF/ID_Verification.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(32, 'Complaint Handling Procedure', 3, 'PDF/COMPLAINTS_HANDLING_PROCEDURES_181016.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(33, 'Records Borrowing Policy', 8, 'PDF/Records_Borrowing_Policy_Rev_3_2017.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(34, 'Standing Order Payroll Procedure', 3, 'PDF/SOP_PAYROLL_PROCEDURE.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(35, 'Standard Procedure - Golden Harvest', 3, 'PDF/SOPGoldenHarvest.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(36, 'Authority Schedule', 8, 'PDF/Authorities_Schedule_14052018.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(37, 'SOP Family Indemnity Plan', 3, 'PDF/SOP_Family_Indemnity_Plan_(FIP)_Updated_February_2017.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(38, 'WSP Client Site User Manual', 3, 'PDF/WSPClientSiteUserManual_UPDATEDVERSION.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(39, 'SOP - Counterfeit Notes', 3, 'PDF/CounterfeitNotes.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(40, 'Journal Books Procedure', 3, 'PDF/SOPJOURNALBOOKS26012015.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(41, 'Branch Operations Manual', 3, 'PDF/Branch_Operations_Manual_V6.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(42, 'SOP Power of Attorney', 3, 'PDF/SOPPowerofAttorney.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(43, 'Purchasing Policy and Procedure', 8, 'PDF/Purchasing_Policy_and_Procedures.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(44, 'Procedure - Teller Overage / Shortage', 3, 'PDF/Procedure_TellerOverage_Shortage.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(45, 'SOP Release of Securities', 3, 'PDF/SOPReleaseofSecurities.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(46, 'SOP Point of Sale', 3, 'PDF/Standard_Operating_Procedure_PointofSale.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(47, 'SOP - Loan Within Shares', 3, 'PDF/SOPLoanwithinShares072016.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(48, 'SOP - E-Gov - Electronic Verification of Identification & TRN', 3, 'PDF/SOPelectronicVerification_of_IDandTRN_E-Gov.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(49, 'Manual Receipt Book Procedure', 3, 'PDF/ManualReceiptBookProcedure_ppt.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(50, 'SOP Giving Information over the Telephone', 3, 'PDF/SOP_GivingInformation_over_the_telephone05032015.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(51, 'SOP Credit - Loan Above', 3, 'PDF/SOPCredit_loan_above.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(52, 'SOP Loan Within Savings', 3, 'PDF/SOPLoanWithinSavings072016.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(53, 'Inactive and Dormant Account Policy and Procedures', 3, 'PDF/Inactive_and_Dormant_Account_Policy_and_Procedures.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(54, 'Fraud and ID Verification', 3, 'PDF/FraudandIDverification.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(55, 'Disaster & Emergency Management Contingency Policy Manual', 8, 'PDF/Disaster_AND_Emergency_ManagementANDContingency_Policy_and_Plan_Manual_Feb14.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(56, 'Family Indemnity Plan Presentation', 3, 'PDF/Family_Indemnity_Plan_Presentation.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(57, 'Loan Within Shares', 3, 'PDF/Loan_Within_Shares_for_COK_All.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(58, 'SOP Update of Member Accounts - Quick Update', 3, 'PDF/SOPUpdateofMemberAccountQuickUpdate.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(59, 'SOP Golden Harvest', 3, 'PDF/SOPGoldenHarvest06112014.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(60, 'SOP Journal Book Procedure', 3, 'PDF/JournalTransfersProcedureFinal.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(61, 'Standard Operating Procedure - Loan Within Shares', 3, 'PDF/SOPLoanwithinSharesPowerPoint.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(62, 'Death and Disability Claim', 3, 'PDF/DEATHANDDISABILITYCLAIM.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(63, 'Suggestion Box Procedure', 3, 'PDF/SuggestionBoxProcedure_PPT.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(64, 'ATM', 3, 'PDF/ATM2014.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(65, 'SOP Power of Attorney', 3, 'PDF/SOPPower_of_AttorneyPP.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(66, 'Procedure for Fixed Deposit', 3, 'PDF/PROCEDURE_FOR_FIXED_DEPOSIT.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(67, 'Foreign Account Tax Compliance Act FAQs', 3, 'PDF/PROCEDURE_FOR_FIXED_DEPOSIT.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(68, 'Foreign Account Tax Compliance Act FAQs', 3, 'PDF/FATCA_FAQs.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(69, 'Dormant Account', 3, 'PDF/Dormant_Account_Presentation2014.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(70, 'Features of a Cheque', 3, 'PDF/SOPFeaturesof_ a_Cheque2014.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(71, 'Closed Accounts Procedure', 3, 'PDF/SOP_ClosedAccountsProcedures.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(72, 'SOP Loan With Savings', 3, 'PDF/SOP_Loan_within_SavingsPPT.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(73, 'Procedures for Handling Counterfeit Notes', 3, 'PDF/PROCEDURE_FOR_HANDLING_ COUNTERFEIT_NOTES.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(74, 'Agent\'s Requirements', 7, 'Agent\'s Requirements', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(75, 'Agreement Re-set', 2, 'PDF/AGREEMENT_RE_SET.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(76, 'ATM Hot Card Request', 1, 'PDF/checklist/ATM hot card request.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(77, 'ATM Incident Report Form', 1, 'PDF/checklist/CUETS%20INCIDENT%20REPORT_doc2.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(78, 'Address Verification Form', 1, 'PDF/ADDRESS_VERIFICATION_FORM112017.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(79, 'Assignment of Life Insurance', 2, 'PDF/Assignment_of_LifeInsurancePolicyFormwithoutJP_new.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(80, 'ATM Safety Tips', 3, 'PDF/ATM_Safety_Tips.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(81, 'Bill of Sale', 2, 'PDF/BILL_OF_SALE.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(82, 'B.O.N.U.S Merchants Locations', 1, 'PDF/BRANCH_LOCATIONS_OF_BONUS_PARTICIPATING_MERCHANTS2013MARCH27.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(83, 'B.O.N.U.S Merchants List', 1, 'PDF/PARTICIPATING_B.O.N.U.S_MERCHANTS2013_MARCH27.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(84, 'Bomb Threat Form', 3, 'PDF/Bomb_Threat_Form.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(85, 'Brawta Checklist', 2, 'PDF/MICRO_BRAWTA_LOAN_CHECKLISTintranet.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(86, 'Change of Payee Request', 1, 'PDF/checklist/CHANGE OF PAYEE REQUEST.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(87, 'COK Retirement Scheme', 1, 'PDF/checklist/COK RETIREMENT SCHEME.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(88, 'Co-maker Hypothecation Form', 2, 'PDF/COMAKER_HYPOTHECATION_FORM.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(89, 'Coporate Application Form', 7, 'PDF/CORPORATE_APPLICATION_FORM.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(90, 'Corporate Membership Signature Card', 7, 'PDF/CORPORATE_MEMBERSHIP_SIGNATURE_CARD.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(91, 'CSU Research & Requsition Form', 7, 'PDF/CSU_Researchand_Requsition_Form.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(92, 'Cuna Claim Statement', 1, 'PDF/LP_and_LS_Claim_Form.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(93, 'Collateral Assessment Form', 2, 'PDF/COLLATERAL_ASSIGNMENT_FORM.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(94, 'Cuna Disability Claim Form', 1, 'PDF/disabilityform2.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(95, 'Debt Consolidation Loan Checklist 2015', 2, 'PDF/checklist/CheckList_DebtConsolidationLoan2015.pdf', 1, 3, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(96, 'E-Services', 2, 'PDF/checklist/E-Services.pdf', 1, 3, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(97, 'Electronic Instructions Authority and Imdemnity (formerly Electronic Disclaimer)', 2, 'PDF/Electronic_Instructions_Authority_and_Indemnity_102014.pdf', 1, 3, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(98, 'Evacuation Head Count Checklist', 7, 'PDF/Evacuation_Headcount_Checklist.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(99, 'Fixed Deposit Agreement Form', 1, 'PDF/checklist/Fixed Deposit Agreement Form.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(100, 'Fixed Deposit Monthly Requests', 1, 'PDF/checklist/Fixed Deposit Monthly Requests.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(101, 'Fixed Deposit Speical Request', 1, 'PDF/checklist/FIXED DEPOSIT SPECIAL REQUEST FORM.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(102, 'FIP Membership Enrollment Form', 1, 'PDF/MEMBER_ENROLLMENT_FORM_FIP.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(103, 'FIP Fact Sheet', 1, 'PDF/FIP_Fact_Sheet_June2016.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(104, 'FIP Changed of Insured Form', 1, 'PDF/FIP_CHANGE_INS_ FORM_R_01_2016.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(105, 'FIP Change of Plan Form', 1, 'PDF/FIP_CHANGE_OF_PLAN_FORM.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(106, 'FIP Claim Statement', 1, 'PDF/FIP_CLAIM_STATEMENT_2016.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(107, 'FIP Designation of Beneficiary', 1, 'PDF/FIP_DES_OF_BENE_FORM_R_01_2016.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(108, 'FIP Proof of Death Form', 1, 'PDF/FIP_PROOF_OF_DEATH_FORM_R_01_2016.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(109, 'FIP Physician Statement', 1, 'PDF/Physician_Statement.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(110, 'Fire Drill Alarm Incident Form', 7, 'PDF/Fire_Drill_Alarm_Incident_Form.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(111, 'Guarantee', 2, 'PDF/GUARANTEE.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(112, 'Golden Harvest Info and spreadsheet', 1, 'PDF/GHarvest_ spreadsheet5P.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(113, 'Guarantor\'s Statement of Affairs', 2, 'PDF/Guarantor_Statement_of_Affairs1.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(114, 'Golden Harvest - Assignment Form', 1, 'PDF/Assignment_Form_for_Golden_Harvest_in_Jamaica.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(115, 'Insurance End Vehicle', 2, 'PDF/Insurance_End_Vehicle.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(116, 'Journal Voucher Weekly Report', 7, 'PDF/Journal_Voucher_Weekly_Report.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(117, 'Lien Release Form', 7, 'PDF/LIENRELEASEFORM.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(118, 'List of BONUS (Readi-Discount) Participants', 1, 'PDF/READIDISCOUNTPARTICIPANTS.pdf', 1, 3, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(119, 'COK Loan Application Form', 2, 'PDF/COK_LOAN_FORM_revised_July2013.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(120, 'Loan Liquidation from Fixed Deposit Form', 2, 'PDF/checklist/Loan Liquidation from Fixed Deposit Form.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(121, 'Loan Agreement', 2, 'PDF/LOAN_AGREEMENT.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(122, 'Health Insurance Request Form', 1, 'PDF/GROUP_CHANGE_REQUEST_FORM.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(123, 'Health Claim Form', 1, 'PDF/revisedhealthclaimform.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(124, 'Incident Report', 3, 'PDF/Incident_Report_Form_Reporting_Location.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(125, 'Internal Suspicious Transaction Report', 3, 'PDF/Internal_Suspicious_Transaction_ReportForm.pdf', 1, 1, '2018-02-16 00:00:00', 1, '2018-02-16 00:00:00', 1),
(126, 'Member Account Internal Reactivation Form', 1, 'PDF/MEMBER_ACCOUNT_INTERNAL_REACTIVATION_FORM2014.PDF', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(127, 'Member Information Form', 1, 'PDF/MEMBER_INFORMATION.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(128, 'Member Power of Attorney Form', 1, 'PDF/checklist/MEMBER - POWER OF ATTORNEY FORM.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(129, 'Member Query Form', 1, 'PDF/checklist/Member Query Form.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(130, 'Monthly Expense Form', 2, 'PDF/checklist/MONTHLY EXPENSES.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(131, 'Mortgage Document Request', 7, 'PDF/checklist/MONTHLY EXPENSES.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(132, '	\r\nMember Update Letter', 2, 'WORD_DOC/Member_UpdateLetter1.doc', 2, 3, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(133, 'Member Update Letter', 1, 'WORD_DOC/Member_UpdateLetter1.doc', 2, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(134, 'Offer Letter', 2, 'PDF/Offer_Letter.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(135, 'Partner Plan Application', 1, 'PDF/Partner_Plan_Form_June_2018.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(136, 'Partner Plan Fact Sheet', 1, 'PDF/Partner_Plan_Information_Sheet.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(137, 'Payday Loan Application', 2, 'PDF/PAY_DAY_LOAN_APPLICATION(amended Feb 2011).pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(138, 'Paymaster Branch Listing', 7, 'PDF/COK_PAYMASTER_BRANCH_LISTING.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(139, 'Pension Application Form', 1, 'Pension Application Form', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(140, 'Power of Attorney', 1, 'PDF/checklist/Power of Attorney.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(141, 'Power of Attorney Information Sheet', 1, 'PDF/Power_of_Attorney_Information_Sheet_ManagersSignOffRevised.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(142, 'Power of Attorney Application Form', 1, 'PDF/POWER_OF_ATTORNEY_APPLICATION.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(143, 'Power of Attorney Signature Card', 1, 'PDF/SIGNATURE CARD_power of_attorney.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(144, 'Promissory Note', 2, 'PDF/PROMISSORY_NOTE.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(145, 'RTGS Form', 7, 'PDF/COK_RTGS_FORM.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(146, 'Real Estate Valuators Listing', 2, 'PDF/COK_Valuators_Listing2010.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(147, 'Requirements to open a Member Account', 1, 'PDF/Policies/REQUIREMENTS_TO_OPEN_A_MEMBER_ACCOUNT.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(148, 'Requirement for Membership - Overseas Applicant', 1, 'PDF/Policies/REQUIREMENTS_TO_OPEN_MEMBER_ACCOUNT_Overseas_Applicant.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(149, 'Salary Deduction Form', 1, 'PDF/Salary_Deduction_Form_editedMar2015.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(150, 'Standing Order Letter - Lodgement', 1, 'PDF/checklist/STANDING ORDER LETTER - LODGEMENTS.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(151, 'Standing Order Instructions', 1, 'PDF/SOPCreatingStandingOrderInstructions.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(152, 'Standing Order Form', 1, 'PDF/Standing_Order_Form_June_2017.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(153, 'Stop Salary Deduction Letter', 1, 'PDF/SALARYDEDUCTIONLETTER.pdf', 1, 3, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(154, 'Suggestion Form for Members', 1, 'PDF/SuggestionFormOnly.pdf', 1, 3, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(155, 'Teller Random Check Form', 3, 'PDF/TellerTransactionReviewFormRevisedJuly2014.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(156, 'Professional Bodies', 7, 'PDF/PROFESSIONAL_ORGANIZATIONS_IN_JAMAICA.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(157, 'Manual Receipt Book Procedure', 3, 'PDF/Procedure_Manual_Receipt_Books.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(158, 'Request	Jamaica Bankers Association FATCA FAQ\'s', 7, 'PDF/JBAFATCAFAQs.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(159, 'Jamaica Bankers Association Fraud FAQ\'s', 7, 'PDF/JBAFraudFAQs.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(160, 'Transfer Request', 1, 'PDF/checklist/Transfer Request.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(161, 'Unsecured Loan Company Listing', 2, 'PDF/COK_UNSECURED_LOANS_COMPANYLISTING_UPDATED_OCTOBER 2013.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(162, 'Withdrawal Form(manual)', 7, 'PDF/Manual_Withdrawal_Form_edited_september2010.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(163, 'Organizational Structure - Employment Type', 6, 'PDF/Organizational_Structure_Employment_Type.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(164, 'Standing Order Form', 2, 'PDF/Standing_Order_Form.pdf', 1, 3, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(165, 'Debt Management Policy', 8, 'PDF/Debt_Management_Policy.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(166, 'Purchasing Policy 2013', 8, 'PDF/Purchasing_Policy_2013.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(167, 'Wire Information - Incoming wires 2018', 1, 'PDF/Wire_Information_Incoming_wires_2018.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(168, 'OUTGOING WIRE AUTHORIZATION FORM 2018', 1, 'PDF/OUTGOING_WIRE_AUTHORIZATION_FORM_2018.pdf', 1, 1, '2018-02-19 00:00:00', 1, '2018-02-19 00:00:00', 1),
(169, 'Member Update Form', 1, 'PDF/MemberUpdateFormMERGED.pdf', 1, 1, '2018-02-20 00:00:00', 1, '2018-02-20 00:00:00', 1),
(176, 'COKCU AML/CFT Policy & Procedures Manual', 8, 'PDF/Anti_Money_Laundering_Counter_Financing_of_Terrorism_Policy_&_Procedures.pdf', 1, 3, '2018-02-21 00:00:00', 1, '2018-02-21 00:00:00', 1),
(177, 'Offences & Sanctions', 9, 'PDF/Risk/App1_Offences_and_Sanctions.pdf', 1, 1, '2018-02-21 00:00:00', 1, '2018-02-21 00:00:00', 1),
(178, 'Offences & Sanctions', 9, 'PDF/Risk/App1_Offences_and_Sanctions.pdf', 1, 3, '2018-02-21 00:00:00', 1, '2018-02-21 00:00:00', 1),
(179, 'Internal Sanctions', 9, 'PDF/Risk/App2_Internal_Sanctions.pdf', 1, 1, '2018-02-21 00:00:00', 1, '2018-02-21 00:00:00', 1),
(180, 'Member Application Form', 1, 'PDF/Risk/App5_Member_Account_Update_Form.pdf', 1, 1, '2018-02-21 00:00:00', 1, '2018-02-21 00:00:00', 1),
(181, 'Source of Funds', 9, 'PDF/Risk/App4_Source_of_Funds_Form.pdf', 1, 1, '2018-02-21 00:00:00', 1, '2018-02-21 00:00:00', 1),
(182, 'Member update & Reactivation Form', 9, 'PDF/Member_Account_Update_Form_MERGED.pdf', 1, 3, '2018-02-21 00:00:00', 1, '2018-02-21 00:00:00', 1),
(183, 'Member Account Reactivation Form', 9, 'PDF/Risk/App6_Member_AccountReactivation.pdf', 1, 3, '2018-02-22 00:00:00', 1, '2018-02-22 00:00:00', 1),
(184, 'Internal Suspicious Transaction Report Form', 9, 'PDF/App7COKCU_Internal_Suspicious_Transaction_ReportForm.pdf', 1, 1, '2018-02-22 00:00:00', 1, '2018-02-22 00:00:00', 1),
(185, 'Procedure for Reporting ThresholdTrns', 9, 'PDF/Risk/App8_Procedures_for_Reporting_Threshold_Txns.pdf', 1, 1, '2018-02-22 00:00:00', 1, '2018-02-22 00:00:00', 1),
(186, 'Procedure for Detecting & Submitting Suspicious Trns', 9, 'PDF/Risk/App8_Procedures_for_Reporting_Threshold_Txns.pdf', 1, 1, '2018-02-22 00:00:00', 1, '2018-02-22 00:00:00', 1),
(187, 'Prescribed Form TTR(POCA)', 9, 'PDF/App10_PrescribedForm_TTR_POCA.pdf', 1, 1, '2018-02-22 00:00:00', 1, '2018-02-22 00:00:00', 1),
(188, 'Prescribed Form STR(POCA)', 9, 'PDF/App11_Prescribed_Form_STR_POCA.pdf', 1, 1, '2018-02-22 00:00:00', 1, '2018-02-22 00:00:00', 1),
(189, 'Redflag for Suspicious Activity', 9, 'PDF/Risk/App12_Red_Flags_for_Suspicious_Activity.pdf', 1, 1, '2018-02-22 00:00:00', 1, '2018-02-22 00:00:00', 1),
(190, 'Terrorism Prevention Act (TPA) Prescribed From', 9, 'PDF/Risk/App13_Prescribed_Form1_TPApdf.pdf', 1, 1, '2018-02-22 00:00:00', 1, '2018-02-22 00:00:00', 1),
(191, 'TPA Prescribed Form II', 9, 'PDF/Risk/App14_Prescribed_Form2_Suspicious_Transaction_Report_TPA.pdf', 1, 1, '2018-02-22 00:00:00', 1, '2018-02-22 00:00:00', 1),
(192, 'Know Your Member Policy 2017', 8, 'PDF/Know_Your_Customer_or_Member_PolicyRev2017.pdf', 1, 3, '2018-02-22 00:00:00', 1, '2018-02-22 00:00:00', 1),
(193, 'FATCA Agreement - Jamaica', 9, 'PDF/FATCA_Agreement_Jamaica_522014.pdf', 1, 1, '2018-02-22 00:00:00', 1, '2018-02-22 00:00:00', 1),
(194, 'FID Advisory to Financial Institutions', 9, 'PDF/FID_Advisory_to_Financial_Institutions.pdf', 1, 1, '2018-02-22 00:00:00', 1, '2018-02-22 00:00:00', 1),
(195, 'What is Fraud', 9, 'PDF/Weekly_ReminderWHAT_IS_FRAUD_Mar25_2015.pdf', 1, 1, '2018-02-22 00:00:00', 1, '2018-02-22 00:00:00', 1),
(196, 'Procedure for Bomb Threat', 0, 'PDF/BOMB_THREAT_April16_2015.pdf', 1, 1, '2018-02-22 00:00:00', 1, '2018-02-22 00:00:00', 1),
(197, 'Procedure for Bomb Threat', 9, 'PDF/BOMB_THREAT_April16_2015.pdf', 1, 3, '2018-02-22 00:00:00', 1, '2018-02-22 00:00:00', 1),
(198, 'Fraud Risk Management Policy 2017', 8, 'PDF/Fraud_Risk_Managment_Policy_2017.pdf', 1, 3, '2018-02-22 00:00:00', 1, '2018-02-22 00:00:00', 1),
(199, 'Enterprise Risk Management Policy 2015', 8, 'PDF/Enterprise_Risk_Management_Pilicy.pdf', 1, 3, '2018-02-22 00:00:00', 1, '2018-02-22 00:00:00', 1),
(200, 'What to do Before During and After a Bank Robbery', 9, 'PDF/What_To_Do_Before_During_and_After_a_BankRobbery.pdf', 1, 1, '2018-02-22 00:00:00', 1, '2018-02-22 00:00:00', 1),
(201, 'Health Insurance Enrollment Form', 1, 'PDF/Health_Insurance_Enrollment_Form_2018.pdf', 1, 1, '2018-02-23 00:00:00', 1, '2018-02-23 00:00:00', 1),
(202, 'STOP SALARY DEDUCTION LETTER', 1, 'PDF/STOP_SALARY_DEDUCTION_LETTER.pdf', 1, 1, '2018-02-23 00:00:00', 1, '2018-02-23 00:00:00', 1),
(203, 'SOP CIF Update of Member Accounts', 3, 'PDF/SOP_CIF_Update_of_Member_Accounts.pdf', 1, 1, '2018-02-23 00:00:00', 1, '2018-02-23 00:00:00', 1),
(204, 'SOP Suggestion Box', 3, 'PDF/SOP_Suggestion_Box.pdf', 1, 1, '2018-02-23 00:00:00', 1, '2018-02-23 00:00:00', 1),
(205, 'SOP ATM Card Management Procedure', 3, 'PDF/SOP_ATM_Card_Management_Procedure.pdf', 1, 1, '2018-02-23 00:00:00', 1, '2018-02-23 00:00:00', 1),
(206, 'MOTOR VECHICLE BID FORM', 5, 'PDF/MOTOR_VECHICLE_BID_FORM.pdf', 1, 1, '2018-02-23 00:00:00', 1, '2018-02-23 00:00:00', 1),
(207, 'Offer To Purchase Form', 5, 'PDF/Offer_To_Purchase_Form_Print.pdf', 1, 1, '2018-02-23 00:00:00', 1, '2018-02-23 00:00:00', 1),
(208, 'COK Sodality Property Private Treaty Bid Form', 3, 'PDF/COK_Sodality_Property_Private_Treaty_Bid_Form_with_Accept_Reject_Final.pdf', 1, 1, '2018-02-23 00:00:00', 1, '2018-02-23 00:00:00', 1),
(209, 'Close Account Form', 1, 'PDF/CloseAccountForm.pdf', 1, 1, '2018-02-23 00:00:00', 1, '2018-02-23 00:00:00', 1),
(210, 'Travelling Claim Form', 6, 'PDF/travelling_claim_standard_Oct2010.pdf', 1, 1, '2018-02-26 00:00:00', 1, '2018-02-26 00:00:00', 1),
(211, 'Request for Salary Advance', 6, 'PDF/Salary_Advance_Form_2013.pdf', 1, 1, '2018-02-26 00:00:00', 1, '2018-02-26 00:00:00', 1),
(212, 'Leave Application', 6, 'PDF/LEAVEFORMNEW2.pdf', 1, 1, '2018-02-26 00:00:00', 1, '2018-02-26 00:00:00', 1),
(213, 'Salary Deduction Form', 6, 'PDF/Salary_Deduction_Form_editedMar2015.pdf', 1, 1, '2018-02-26 00:00:00', 1, '2018-02-26 00:00:00', 1),
(214, 'Salary Advance Policy & Form', 6, 'PDF/Salary_Advance_Form_2013.pdf', 1, 1, '2018-02-26 00:00:00', 1, '2018-02-26 00:00:00', 1),
(215, 'Overtime Form', 6, 'PDF/Overtime_Form.pdf', 1, 1, '2018-02-26 00:00:00', 1, '2018-02-26 00:00:00', 1),
(216, 'Guideline for completing Performance Appraisal', 6, 'HRForms/Guidelines_for_completing_the_Performance_Management_Appraisal.docx', 2, 1, '2018-02-26 00:00:00', 1, '2018-02-26 00:00:00', 1),
(217, 'Performance Appraisal Form (Management)', 6, 'HRForms/Performance_Appraisal_FORM_Management221011.doc', 2, 1, '2018-02-26 00:00:00', 1, '2018-02-26 00:00:00', 1),
(218, 'Performance Appraisal Form (Non-Management)', 6, 'HRForms/Performance_Appraisal_FORM_NonManagement0811.doc', 1, 1, '2018-02-26 00:00:00', 1, '2018-02-26 00:00:00', 1),
(219, 'Performance Appraisal Form 0611', 6, 'HRForms/Performance_Appraisal_FORM0611.pdf', 1, 1, '2018-02-26 00:00:00', 1, '2018-02-26 00:00:00', 1),
(220, 'Performance Key Competencies - Managers', 6, 'HRForms/PERFORMANCE_KEY_COMPETENCIES_MANAGERS.doc', 2, 1, '2018-02-26 00:00:00', 1, '2018-02-26 00:00:00', 1),
(221, 'Performance Key Competencies - Non-Managers', 6, 'HRForms/PERFORMANCE_KEY_COMPETENCIES_NONMANAGERS.doc', 2, 1, '2018-02-26 00:00:00', 1, '2018-02-26 00:00:00', 1),
(222, 'GENERAL IT REQUEST FORM', 4, 'PDF/GENERAL_IT_REQUEST_FORM2017.pdf', 1, 1, '2018-02-26 00:00:00', 1, '2018-02-26 00:00:00', 1),
(223, 'Electronic Instructions Authority and Imdemnity', 1, 'PDF/Electronic_Instructions_Authority_and_Indemnity_102014.pdf', 1, 1, '2018-02-26 00:00:00', 1, '2018-02-26 00:00:00', 1),
(224, 'Fraud Risk Managment Policy 2017', 6, 'PDF/Fraud_Risk_Managment_Policy_2017.pdf', 1, 3, '2018-03-01 00:00:00', 1, '2018-03-01 00:00:00', 1),
(225, 'App 4 Source of Funds Form', 6, 'PDF/App_4_Source_of_Funds_Form.pdf', 1, 1, '2018-03-01 00:00:00', 1, '2018-03-01 00:00:00', 1),
(226, '50 50 Promotion', 1, 'PDF/50_50_Promo_Form_final_(060418).pdf', 1, 1, '2018-04-06 00:00:00', 1, '2018-04-06 00:00:00', 1),
(227, '50 50 Saving Promotion Rules', 1, 'files/word/50_50_Savings_Promotion_Rules_(060418).docx', 2, 1, '2018-04-09 00:00:00', 1, '2018-04-09 00:00:00', 1),
(228, 'MIS Policy', 8, 'PDF/MIS_Policy.pdf', 1, 1, '2018-04-20 00:00:00', 1, '2018-04-20 00:00:00', 1),
(229, 'Enterprise Risk Management Policy', 8, 'PDF/Enterprise_Risk_Management_Policy.pdf', 1, 1, '2018-05-14 00:00:00', 1, '2018-05-14 00:00:00', 1),
(230, 'Motor Vehicle Valuation Listing', 2, 'PDF/Motor_Vehicle_Valuators_Listing_Updated_May_2018.pdf', 1, 1, '2018-05-29 00:00:00', 1, '2018-05-29 00:00:00', 1),
(231, 'BONUS Merchants', 1, 'PDF/BRANCH_LOCATIONS_OF_BONUS_PARTICIPATING_MERCHANTS_201017.pdf', 1, 1, '2018-06-12 00:00:00', 1, '2018-06-12 00:00:00', 1),
(232, 'Fit and Proper Policy Manual Rev6', 8, 'PDF/Fit_and_Proper_Policy_Manual_Rev6_2018.pdf', 1, 1, '2018-07-12 00:00:00', 1, '2018-07-12 00:00:00', 1),
(233, 'Inactive and Dormant Account Policy and Procedures Rev6', 8, 'PDF/Inactive_and_Dormant_Account_Policy_and_Procedures_Rev6_2018.pdf', 1, 1, '2018-07-12 00:00:00', 1, '2018-07-12 00:00:00', 1),
(234, 'Corporate Governance Policy and Guidance', 8, 'PDF/Corporate_Governance_Policy_and_Guidance.pdf', 1, 1, '2018-07-12 00:00:00', 1, '2018-07-12 00:00:00', 1),
(235, 'COK UNSECURED LOAN 2018 Checklist', 2, 'PDF/Check_list_for_COK_UNSECURED_LOAN_2018.pdf', 1, 1, '2018-07-20 00:00:00', 1, '2018-07-20 00:00:00', 1),
(236, 'SOP - Cuna Sales Associate', 3, 'PDF/SOP_Cuna_Sales_Associate_August_2_2018.pdf', 1, 1, '2018-08-07 00:00:00', 1, '2018-08-07 00:00:00', 1),
(237, 'KYM Policy', 8, 'PDF/KYM_Policy_July_2018.pdf', 1, 1, '2018-08-13 00:00:00', 1, '2018-08-13 00:00:00', 1),
(238, 'AML CFT Policy', 8, 'PDF/AML_CFT_Policy_Rev_72018.pdf', 1, 1, '2018-08-13 00:00:00', 1, '2018-08-13 00:00:00', 1),
(239, 'Credit Risk management', 8, 'PDF/Credit_Risk_management_July_2018.pdf', 1, 1, '2018-08-13 00:00:00', 1, '2018-08-13 00:00:00', 1),
(240, 'Driver Application', 7, 'PDF/Dirver_Application.pdf', 1, 1, '2018-08-15 00:00:00', 1, '2018-08-15 00:00:00', 1),
(241, 'Commercial Motor Vehicle', 7, 'PDF/(POCA)COMMERCIAL_MOTOR_VEHICLEPF.pdf', 1, 1, '2018-08-15 00:00:00', 1, '2018-08-15 00:00:00', 1),
(242, 'Private Motor Vehicle', 7, 'PDF/(POCA)Private_MotorPF.pdf', 1, 1, '2018-08-15 00:00:00', 1, '2018-08-15 00:00:00', 1),
(243, 'SOFTWARE MODIFICATION FORM', 4, 'PDF/Software_Modification_Request2017.pdf', 1, 1, '2018-08-15 00:00:00', 1, '2018-08-15 00:00:00', 1),
(244, 'RATE CHANGE REQUEST FORM', 4, 'PDF/RATE_CHANGE_REQUEST.pdf', 1, 1, '2018-08-15 00:00:00', 1, '2018-08-15 00:00:00', 1),
(245, 'HARDWARE REQUEST FORM', 4, 'PDF/Hardware_%20Request2017.pdf', 1, 1, '2018-08-15 00:00:00', 1, '2018-08-15 00:00:00', 1),
(246, 'SOFTWARE MODIFICATION APPROVAL', 4, 'PDF/SOFTWARE%20MODIFICATION%20APPROVAL2.pdf', 1, 1, '2018-08-15 00:00:00', 1, '2018-08-15 00:00:00', 1),
(247, 'Giving member information over the phone', 3, 'PDF/SOP_Giving_Information_over_the_telephone.pdf', 1, 1, '2018-08-15 00:00:00', 1, '2018-08-15 00:00:00', 1),
(248, 'Employee Handbook', 6, 'PDF/EmployeeHandbook2011.pdf', 1, 1, '2018-08-15 00:00:00', 1, '2018-08-15 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `document_format`
--

CREATE TABLE `document_format` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document_format`
--

INSERT INTO `document_format` (`id`, `name`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'pdf', 1, '2018-02-08 00:00:00', 1, '2018-02-08 00:00:00', 1),
(2, 'Word', 1, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(3, 'Excel', 1, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(4, 'Link', 1, '2018-02-26 00:00:00', 1, '2018-02-26 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

CREATE TABLE `document_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document_types`
--

INSERT INTO `document_types` (`id`, `name`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Member', 1, '2018-02-08 00:00:00', 1, '2018-02-08 00:00:00', 1),
(2, 'Credit', 1, '2018-02-08 00:00:00', 1, '2018-02-08 00:00:00', 1),
(3, 'Operation procedures', 1, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(4, 'MIS', 1, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(5, 'DMU', 1, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(6, 'HR & learning', 1, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(7, 'Other', 1, '2018-02-09 00:00:00', 1, '2018-02-10 00:00:00', 1),
(8, 'Policy', 1, '2018-02-09 00:00:00', 1, '2018-02-09 00:00:00', 1),
(9, 'Risk & Compliance', 1, '2018-02-21 00:00:00', 1, '2018-02-21 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(134) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `role_id` int(10) UNSIGNED NOT NULL,
  `extention` int(10) UNSIGNED DEFAULT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `encrypted_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `reset_password_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_sent_at` datetime DEFAULT NULL,
  `current_sign_in_at` datetime DEFAULT NULL,
  `last_sign_in_at` datetime DEFAULT NULL,
  `current_sign_in_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_sign_in_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varbinary(50000) DEFAULT NULL,
  `cheked_notification_at` datetime NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `role_id`, `extention`, `branch_id`, `encrypted_password`, `reset_password_token`, `reset_password_sent_at`, `current_sign_in_at`, `last_sign_in_at`, `current_sign_in_ip`, `last_sign_in_ip`, `image`, `cheked_notification_at`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'super_admin', 'super_admin@cok.com', 1, NULL, 0, '5f4dcc3b5aa765d61d8327deb882cf99', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-05-13 05:26:59', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 'admin', 'admin@cok.com', 2, NULL, 0, '5f4dcc3b5aa765d61d8327deb882cf99', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-05-13 08:51:41', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 'staff', 'staff@cok.com', 3, NULL, 0, '5f4dcc3b5aa765d61d8327deb882cf99', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-05-13 08:31:49', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 'contract', 'contract@cok.com', 4, NULL, 0, '5f4dcc3b5aa765d61d8327deb882cf99', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-05-13 08:31:49', 1, '2018-01-30 00:00:00', 1, '2018-01-30 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_activities`
--

CREATE TABLE `user_activities` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(8000) DEFAULT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `title`, `description`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'super_admin', 'for testing, this account access all rights to access everything.', 1, '2018-01-30 12:15:50', 1, '2018-01-30 12:15:50', 1),
(2, 'admin', 'for testing, this account access access to exit and archive things.', 1, '2018-01-30 12:15:50', 1, '2018-01-30 12:15:50', 1),
(3, 'permanet_staff', 'for testing, this account has low level access to login in and view records per their department. unable to delete or update.', 1, '2018-01-30 12:23:08', 1, '2018-01-30 12:23:08', 1),
(4, 'contratced_staff', 'for testing, this account has access to login and view, however can not make any other changes.', 1, '2018-01-30 12:23:08', 1, '2018-01-30 12:23:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role_permissions`
--

CREATE TABLE `user_role_permissions` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_errors`
--
ALTER TABLE `db_errors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_format`
--
ALTER TABLE `document_format`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_types`
--
ALTER TABLE `document_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `db_errors`
--
ALTER TABLE `db_errors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `document_format`
--
ALTER TABLE `document_format`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `document_types`
--
ALTER TABLE `document_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
