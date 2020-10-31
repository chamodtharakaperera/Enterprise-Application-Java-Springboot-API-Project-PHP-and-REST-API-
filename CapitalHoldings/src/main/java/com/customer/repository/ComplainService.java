package com.customer.repository;


import java.util.ArrayList;

import java.util.List;


import org.springframework.beans.factory.annotation.Autowired;

import org.springframework.stereotype.Service;


import com.customer.model.Complain;

@Service

public class ComplainService {
	@Autowired
	private ComplainRepository repository;
	public java.util.List<Complain> getAllComplain()
	{
		
		java.util.List <Complain> complainList=repository.findAll();
		
		if(complainList.size()>0)
		{	
			return complainList;
		}
		else 
		{	return new ArrayList<Complain>();}
		
	}
	public Complain createOrUpdateComplain(Complain entity)
	{
		
		return repository.save(entity);
	}
	public long totalComplains( )
	{
				
		return repository.count(); 
	}
	public void deleteComplain(Long id)
	{
		
		repository.delete(id);
	}
	public void deleteAll()
	{
		
		repository.deleteAll();
	}
	public List<Complain> findByFirstname (String name)
	{
		
		
		return repository.findByFirstname(name);
	}

	public List<Complain> findByStartDateBetween (String from,String to)
	{
		// java.util.Date d= SimpleDateFormat.parse(from);2
		return repository.findByStartDateBetween(from,to);
	}
	
	
	public void updateCus(int cusid)
	{
		
		repository.updateCusId(cusid,repository.getcompId());
	}
	/* public JasperPrint exportReport(String reportFormat) throws FileNotFoundException, JRException {
	        String path = "C:\\Users\\Udeesha Bandara\\Desktop\\Report";
	        List<Complain> employees = repository.findAll();
	        //load file and compile it
	        File file = ResourceUtils.getFile("classpath:employees.jrxml");
	        JasperReport jasperReport = JasperCompileManager.compileReport(file.getAbsolutePath());
	        JRBeanCollectionDataSource dataSource = new JRBeanCollectionDataSource(employees);
	        Map<String, Object> parameters = new HashMap<>();
	        parameters.put("createdBy", "Capital Hodlings");
	        JasperPrint jasperPrint = JasperFillManager.fillReport(jasperReport, parameters, dataSource);
	        
	       if (reportFormat.equalsIgnoreCase("html")) {
	             JasperExportManager.exportReportToHtmlFile(jasperPrint, path + "\\employees.html");
	        }
	        if (reportFormat.equalsIgnoreCase("pdf")) {
	            JasperExportManager.exportReportToPdfFile(jasperPrint, path + "\\employees.pdf");
	        }
			return jasperPrint;

	       
	    }*/
}
