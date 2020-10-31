package com.customer.controller;




import java.util.List;


import javax.websocket.server.PathParam;

import org.springframework.beans.factory.annotation.Autowired;


import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;

import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;

import org.springframework.web.bind.annotation.RestController;


import com.customer.model.Complain;

import com.customer.repository.ComplainService;




@RestController
@RequestMapping(path="/complains")
public class ComplainController {
	@Autowired
	private ComplainService complainService;
	
	//Retrieve data
	@GetMapping(path="/",produces="application/json")
	public List<Complain> getComplain()
	{
		return complainService.getAllComplain();
		
	}
	//save data
	@PostMapping(path="/save",consumes="application/json",produces="application/json")
	public void addComplain(@PathParam("cusid")int cusid,@RequestBody Complain complain)
	{				
	
		
		Integer id = complainService.getAllComplain().size()+1;
		complain.setId(new Long(id));	
	
		complainService.createOrUpdateComplain(complain);	
		complainService.updateCus(cusid);
		
	
	}
	//update complains by id
	@PutMapping(path="/",consumes="application/json",produces="application/json")
	public void updateComplain(@PathParam("id")Long id, Complain complain)
	{
		complain.setId(id);
		
		 complainService.createOrUpdateComplain(complain);
	}
	//Delete complains by id
	@DeleteMapping(path="/",consumes="application/json",produces="application/json")
	public String deleteComplain(@PathParam("id")Long id, Complain complain)
	{
		
		complainService.deleteComplain(id);
		return "ID no is deleted";
		
	}
	//delete all complains
	@DeleteMapping(path="/deleteAll",consumes="application/json",produces="application/json")
	public String deleteAll()
	{
		
		complainService.deleteAll();
		return "All complains are deleted Successfully";
		
	}
	//get total no of complains
	@GetMapping(path="/totalComplains",produces="application/json")
	public String totalComplains()
	{
		return "Total Number of complains : "+ String.valueOf(complainService.totalComplains());
		
	}
	//Find complains related to corresponding sale representative
	@GetMapping(path="/findByFirstname",produces="application/json")
	public List<Complain> findByFirstname(@PathParam("name")String name)
	{
		
		return complainService.findByFirstname(name);
	}
	//Filter complains according to purchase date
	@GetMapping(path="/period",produces="application/json")
	public List<Complain> findByStartDateBetween(@PathParam("from") String from,@PathParam("to") String to)
	{
		
		return complainService.findByStartDateBetween(from,to);
	}
	/*@GetMapping("/report/{format}")
    public void generateReport(@PathVariable String format, HttpServletResponse response) throws IOException,FileNotFoundException, JRException {
		complainService.exportReport(format);
        //response.sendRedirect("some-url");
    }*/
	
}
