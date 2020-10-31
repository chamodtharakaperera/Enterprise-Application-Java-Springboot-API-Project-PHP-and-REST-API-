package com.customer.repository;

import com.customer.model.ProductService;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;

import javax.transaction.Transactional;

public interface ServiceRequestRepository extends JpaRepository<ProductService,Integer> {
@Query(value="select max(serviceid) from product_service",nativeQuery = true)
    int getserviceId();

@Modifying(clearAutomatically = true)
    @Transactional
    @Query(value = "update product_service u set u.cusid=?1 where u.serviceid=?2",nativeQuery = true)
    void updateCusId(int cusid,int id);
}
