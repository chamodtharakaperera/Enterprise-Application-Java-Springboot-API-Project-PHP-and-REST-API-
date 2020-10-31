package com.customer.repository;



import java.util.List;

import org.springframework.data.repository.query.Param;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import org.springframework.stereotype.Repository;

import com.customer.model.Complain;

@Repository
public interface ComplainRepository extends JpaRepository<Complain, Long> {
	
	//Search complains by sales representative name
	//Annotation-based named query 
	  @Query(value="select U from Complain U where U.repfirst like %?1")	
	  //Query method
	 List<Complain> findByFirstname(@Param("name") String name);	
	  
	  

	  @Query(value="select P from Complain P where P.DOP between ?1 and ?2")	
	  List<Complain>findByStartDateBetween(@Param("from") String from,@Param("to") String to);
	 

	 
}
