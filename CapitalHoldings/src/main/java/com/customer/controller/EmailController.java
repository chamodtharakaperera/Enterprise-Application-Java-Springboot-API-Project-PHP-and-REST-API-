package com.customer.controller;


import org.springframework.mail.MailException;



import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.customer.model.Customer;
import com.customer.repository.EmailService;

@RestController
@RequestMapping(path="/mail")
public class EmailController {
	@Autowired
	private EmailService EmailService;
	private Logger logger=LoggerFactory.getLogger(EmailController.class);
	@PostMapping(path="/",consumes="application/json",produces="application/json")
	
	public String sendVerifyMail(@RequestBody Customer customer)
	{
		
		try{
			
			EmailService.sendNotify(customer);
			
		}catch(MailException e){
			
			
			logger.info("Error sending email "+ e.getMessage());
		}      
		
		return "Email has been sent successfully";
		
	}
@PostMapping(path="/feedback",consumes="application/json",produces="application/json")
	
	public String sendFeedback(@RequestBody Email email)
	{
		
		try{
			
			EmailService.sendFeedback(email.getMsg(),email.getEmail());
			
		}catch(MailException e){
			
			
			logger.info("Error sending email "+ e.getMessage());
		}      
		
		return "Email has been sent successfully";
		
	}

}
