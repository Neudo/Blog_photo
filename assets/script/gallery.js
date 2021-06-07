

const categoName = document.querySelector('.category-name');
const containerGallery = document.querySelector('.container-gallery');


const categoLinks = document.querySelectorAll('.category-name > a')
const categoryGalleries = document.querySelectorAll('.category-gallery')

const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        categoryGalleries.forEach((categoryGallery, index) => {
          if (
            entry.target == categoryGallery &&
            (entry.intersectionRatio >= 0.5 ||
              entry.intersectionRatio <=  0.25)
          )
          setActiveLink(index)
        })
      }
    })
  },
  {
    threshold: [0.25, 0.5],
  }
)

categoryGalleries.forEach((categoryGallery) => observer.observe(categoryGallery))

const setActiveLink = (index) => {
  categoLinks.forEach((link) => link.classList.remove('active'))
  categoLinks[index].classList.add('active')
}

