package com.customer.repository;



import java.util.List;

import javax.transaction.Transactional;

import org.springframework.data.repository.query.Param;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
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

	  @Query(value="select P from Complain P where P.purDate between ?1 and ?2")	
	  List<Complain>findByStartDateBetween(@Param("from") String from,@Param("to") String to);
	 
	  @Query(value ="select max(id) from #{#entityName}", nativeQuery = true) 
	  int getcompId();
	  
	  @Modifying(clearAutomatically = true)
	  @Transactional
	  @Query(value ="update #{#entityName} u set u.cus_id=?1 where u.id=?2 ", nativeQuery = true) 
	  void updateCusId(int cusid,int id);
	  
	  
	  
	/*  @Query(value = "select c.id,c.complain,c.nomachine,c.dop,"+"cu.firstname,cu.tel"+" from complain c"+" inner join customer cu on c.cus_id=cu.cus_id "+"where c.repfirst='$selid'")
			List<Object[]> findAllComp();
	  */
}
