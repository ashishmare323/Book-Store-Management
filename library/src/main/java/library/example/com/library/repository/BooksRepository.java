package library.example.com.library.repository;

import java.util.Optional;

import org.springframework.data.mongodb.repository.MongoRepository;
import org.springframework.data.mongodb.repository.Query;

import library.example.com.library.model.Books;

public interface BooksRepository extends MongoRepository<Books, String>{
    
    @Query("{'name': ?0}")
    public
    Optional<Books> findByName(String name);

}
