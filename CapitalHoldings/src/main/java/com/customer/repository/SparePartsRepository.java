package com.customer.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.customer.model.SpareParts;

@Repository
public interface SparePartsRepository extends JpaRepository<SpareParts, Long>{

	List<SpareParts> findAll();
	
}
