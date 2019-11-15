class insertProduct {
    getProduct() {
        console.log("coucou");
        let product = $.get("http://10.133.129.113:3000/produits/2/3", function(
            data,
            status
        ) {
            console.log("coucou");
            console.log("Data: " + data);
            console.log("dfsdfsdf");
        });
        console.log(product);
    }
}
$(document).ready(function() {
    const coucou = new insertProduct();
    coucou.getProduct();
});

// class insertProduct {
//     $productNumber;
//     newProduct(){
//         const products = $.get("http://10.133.129.113:3000/produits/2/10");
//         const coucou = products.map(item => {
//             return this.insertProduct(item);
//         )};
//     }

//     insertProduct(product) {
//         const { image, title, description } = product;
//         console.log("insertProduct");
//         return (
//           <CustomArticle
//             className="content__article"
//             image={image}
//             title={title}
//             description={description}
//           />
//         );
//       }

// }

// $(window).scroll(function() {
//     if (
//       Math.round($(window).scrollTop() + $(window).height()) ===
//       $(document).height()
//     ) {
//       console.log("scroll");
//       loader.loadNextPage();
//     }
//   });

// class App extends PureComponent {

//   page = 0;

//   loadNextPage() {
//     this.page++;
//     this.productNumber+=4;
//     const products = [1, 2, 3, 4].map(index => ({
//       image: ,
//       title: faker.name.title(),
//       description: faker.lorem.lines()
//     }));

//     const coucou = products.map(item => {
//       return this.insertProduct(item);
//     });
//     // console.log("1", coucou);
//     return coucou;
//     // setTimeout(() => {
//     //   const products = [1, 2, 3, 4].map(index => ({
//     //     image: faker.image.nature(),
//     //     title: faker.name.title(),
//     //     description: faker.lorem.lines()
//     //   }));
//     //   const coucou = products.map(item => {
//     //     return this.insertProduct(item);
//     //   });
//     //   console.log("1", coucou);
//     //   return coucou;
//     // }, 100);
//   }

//   // state = {
//   //   todo: [
//   //     {
//   //       image: faker.image.nature(),
//   //       title: faker.name.title(),
//   //       description: faker.lorem.lines()
//   //     },
//   //     {
//   //       image: "./img/vieil_homme_sourire.jpg",
//   //       title: "Title",
//   //       description: "Description"
//   //     },
//   //     {
//   //       image: "./img/vieil_homme_sourire.jpg",
//   //       title: "Title",
//   //       description: "Description"
//   //     }
//   //   ]
//   // };
//   // renderState() {
//   //   for (const i = 0; i < 1500; i++) {
//   //     this.todo.push({ title: "title" + i, description: "Description" });
//   //     console.log("title" + i);
//   //   }
//   // }

//   insertProduct(product) {
//     const { image, title, description } = product;
//     console.log("insertProduct");
//     return (
//       <CustomArticle
//         className="content__article"
//         image={image}
//         title={title}
//         description={description}
//       />
//     );
//   }

//   render() {
//     return <div className="content">{this.insertProduct()}</div>;
//   }

//   // _renderCards = () => {
//   //   return this.state.todo.map((todo, index) => (
//   //     <CustomArticle
//   //       key={index}
//   //       index={index}
//   //       image={this.image}
//   //       title={todo.title}
//   //       description={todo.description}
//   //       onClick={this.handleClick}
//   //     />
//   //   ));
//   // };

//   // handleClick = indexClicked => {

//   //   const todo = this.state.todo.filter(
//   //     (todo, index) => index !== indexClicked
//   //   );
//   //   this.setState({ todo });
//   // };
// }

// const loader = new App();
// loader.loadNextPage();
// loader.loadNextPage();
// loader.loadNextPage();
// window.scrollTo(0, 0);

// $(window).scroll(function() {
//   if (
//     Math.round($(window).scrollTop() + $(window).height()) ===
//     $(document).height()
//   ) {
//     console.log("scroll");
//     loader.loadNextPage();
//   }
// });

// export default App;
