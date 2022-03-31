using System;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata;

// Code scaffolded by EF Core assumes nullable reference types (NRTs) are not used or disabled.
// If you have enabled NRTs for your project, then un-comment the following line:
// #nullable disable

namespace ProductionSimulation.Models
{
    public partial class cs_beugroContext : DbContext
    {
        public cs_beugroContext()
        {
        }

        public cs_beugroContext(DbContextOptions<cs_beugroContext> options)
            : base(options)
        {
        }

        public virtual DbSet<Production> Production { get; set; }
        public virtual DbSet<Products> Products { get; set; }

        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            if (!optionsBuilder.IsConfigured)
            {
                //To protect potentially sensitive information in your connection string, you should move it out of source code. See http://go.microsoft.com/fwlink/?LinkId=723263 for guidance on storing connection strings.
                optionsBuilder.UseMySql("user id=root;password=asd123;host=localhost;database=cs_beugro", x => x.ServerVersion("8.0.28-mysql"));
            }
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.Entity<Production>(entity =>
            {
                entity.ToTable("production");

                entity.Property(e => e.Id).HasColumnName("id");

                entity.Property(e => e.EndDate)
                    .HasColumnName("endDate")
                    .HasColumnType("datetime");

                entity.Property(e => e.PcbId).HasColumnName("pcb_id");

                entity.Property(e => e.Quantity).HasColumnName("quantity");

                entity.Property(e => e.StartDate)
                    .HasColumnName("startDate")
                    .HasColumnType("datetime");
            });

            modelBuilder.Entity<Products>(entity =>
            {
                entity.ToTable("products");

                entity.Property(e => e.Id).HasColumnName("id");

                entity.Property(e => e.Pcb)
                    .IsRequired()
                    .HasColumnName("pcb")
                    .HasColumnType("varchar(45)")
                    .HasCharSet("utf8mb4")
                    .HasCollation("utf8mb4_0900_ai_ci");
            });

            OnModelCreatingPartial(modelBuilder);
        }

        partial void OnModelCreatingPartial(ModelBuilder modelBuilder);
    }
}
