package com.customer.repository;


import java.util.HashMap;


import javax.mail.MessagingException;
import javax.mail.internet.MimeMessage;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.mail.MailException;

import org.springframework.mail.javamail.JavaMailSender;
import org.springframework.mail.javamail.MimeMessageHelper;
import org.springframework.stereotype.Service;


import com.customer.model.Customer;


@Service
public class EmailService {
	public int row=1;
	@Autowired
	private JavaMailSender javaMailSender;
	@Autowired
	private CustomerRepository cusRepo;
	public HashMap<Integer,Customer> waitingCustomers= new HashMap<Integer, Customer>();;
	
	public EmailService(JavaMailSender javaMailSender)
	{
		this.javaMailSender=javaMailSender;
		
	}
	public void sendNotify(Customer cus) throws MailException
	{
		try {
				if(waitingCustomers.isEmpty())
				{	
					cus.setCusId(cusRepo.getlastId()+1);
				}
				else
				{ 	
					cus.setCusId((long) (waitingCustomers.get(row).getCusId()+1));
					row+=1;
				}
				
				waitingCustomers.put(row,cus);
		        MimeMessage hlp = javaMailSender.createMimeMessage();
	            MimeMessageHelper mail = new MimeMessageHelper(hlp, true);
				mail.setTo("nibmprojectreset@gmail.com");
				mail.setFrom("nibmprojectreset@gmail.com");
				mail.setSubject("Please active account");
				//Multipurpose Internet Mail Extensions
				//MIME msg
			
				mail.setText(msgBody(row), true);
				javaMailSender.send(hlp);
				
			} catch (MessagingException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			}				
	}
	public void sendFeedback(String msg,String to) throws MailException
	{
		try {
				
		        MimeMessage hlp = javaMailSender.createMimeMessage();	//Multipurpose Internet Mail Extensions
	            MimeMessageHelper mail = new MimeMessageHelper(hlp, true);
				mail.setTo(to);
				mail.setFrom("nibmprojectreset@gmail.com");
				mail.setSubject("Resolving your complain");
				mail.setText(msg);
				javaMailSender.send(hlp);
				
			} catch (MessagingException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			}				
	}
	public String msgBody(int row)
	{
		
		 return "<html><body><h3>Dear Admin!<br>Please active the following customer account</h3><table style='border-style: solid;' cellpadding='7'> <tr><th bgcolor='#F19393'>Expected Cus No</th><th bgcolor='#1FD170'>First Name</th><th bgcolor='#F19393'>Last Name</th><th bgcolor='#1FD170'>Address</th><th bgcolor='#F19393'>Telephone</th><th bgcolor='#1FD170'>Email</th><th bgcolor='#F19393'>User Name</th><th bgcolor='#1FD170'>Password</th></tr><tr><td>"+waitingCustomers.get(row).getCusId()+"</td><td>"+waitingCustomers.get(row).getFirstName()+"</td><td>"+waitingCustomers.get(row).getLastName()+"</td><td>"+waitingCustomers.get(row).getAdd()+"</td><td>"+waitingCustomers.get(row).getTel()+"</td><td>"+waitingCustomers.get(row).getEmail()+"</td><td>"+waitingCustomers.get(row).getUsername()+"</td><td>"+waitingCustomers.get(row).getPassword()+"</td></tr></table><h4>Activation Link - http://localhost:8080/customer/save?id="+row+"</h4><br><h4>Thank You!</></body></html>";
		
	}

}
