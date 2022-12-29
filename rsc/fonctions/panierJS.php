<html>
<script>
  async function supprimerDuPanier(id) {
    try {
      const response = await fetch(`./rsc/fonctions/supprimerPanier.php?idCD=${id}`, {
        method: 'GET'
      });
      if (response.ok) {
        location.reload()
      } else {
        throw new Error('Error deleting item from cart');
      }
    } catch (error) {
      console.error(error);
    }
  }
  async function modifierquantitePanier(id, nombre) {
    try {
      const response = await fetch(`./rsc/fonctions/modifierPanier.php?idCD=${id}&quantite=${nombre}`, {
        method: 'GET'
      });
      if (response.ok) {
        location.reload()
      } else {
        throw new Error('Error deleting item from cart');
      }
    } catch (error) {
      console.error(error);
    }
  }

  async function ajoutCdSession(id) {
    try {
      const response = await fetch(`./rsc/fonctions/ajoutPanier.php?idCD=${id}`, {
        method: 'GET'
      });
      if (response.ok) {
      } else {
        throw new Error('Error adding item to cart');
      }
    } catch (error) {
      console.log(error);
    }
    // 
  }

  async function viderPanier() {
    try {
      const response = await fetch('./rsc/fonctions/viderPanier.php', {
        method: 'GET'
      });
      if (response.ok) {
        location.reload();
      } else {
        throw new Error('Error clearing cart');
      }
    } catch (error) {
      console.error(error);
    }
  }
</script>

</html>