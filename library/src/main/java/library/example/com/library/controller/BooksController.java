package library.example.com.library.controller;

import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import library.example.com.library.model.Books;
import library.example.com.library.service.BooksService;

import java.util.List;

import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;

@RestController
@RequestMapping("/api/books")

public class BooksController {
    
    public final BooksService booksService;

    public BooksController(BooksService booksService){
        this.booksService = booksService;
    }

    @PostMapping
    public ResponseEntity addBooks(@RequestBody Books books) {
        booksService.addbooks(books);
        return ResponseEntity.ok().build();
    }

    @PutMapping
    public ResponseEntity updateBooks(@RequestBody Books books) {
        return ResponseEntity.ok().build();
    }

    @GetMapping
    public ResponseEntity<List<library.example.com.library.model.Books>>getAllBooks() {
        return ResponseEntity.ok(booksService.getAllbooks());
    }
    
    @GetMapping("/{name}")
    public ResponseEntity getBooksByName(@PathVariable String name) {
        return ResponseEntity.ok(booksService.getbooksByName(name));
    }

    @DeleteMapping("/{id}")
    public ResponseEntity deleteBooks(@PathVariable String id) {
        booksService.deletebooks(id);
        return ResponseEntity.status(HttpStatus.NO_CONTENT).build();
    }

}
