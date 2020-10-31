package com.customer.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.stereotype.Repository;

import com.customer.model.Customer;
@Repository
public interface CustomerRepository extends JpaRepository<Customer, Long>{

	
	  List<Customer>findByUsernameAndPassword(String uname,String pass);
	
	  @Query("select u from #{#entityName} u where u.email = ?1 and user_Name = ?2")
	  List<Customer> findByEmailandUsername(String email,String uname);
	  
	  @Query(value ="select max(cus_id) from #{#entityName}", nativeQuery = true) 
	  Long getlastId();
	  
	  @Query(value ="select cus_id from #{#entityName} u where u.user_name=?1 ", nativeQuery = true) 
	  int getCurrentCusId(String usrname);
	  
}

